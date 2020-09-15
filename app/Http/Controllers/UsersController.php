<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use App\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
{

	public function userLoginRegister(){
	return view('users.login_register');
    }

    public function register(Request $request){
      if($request->isMethod('post')){
      	$data = $request->all();


         
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
        	return redirect('/login-register')->with('flash_message_error','This account already exists!');
        }
        else{
        	$user = new User;
        	$user->name = $data['name'];
        	$user->email = $data['email'];
        	$user->password = bcrypt($data['password']);
        	$user->save();



            // $email = $data['email'];
            // $messageData = ['email' => $data['email'], 'name'=>$data['name']];
            // Mail::send('emails.register', $messageData,function($message) use($email){
            //     $message->to($email)->subject('Registeration with Bakery Website');
            // });


            //Send Confirmation Email

           $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                    $message->to($email)->subject('Confirm your E-com Account');
                });

                return redirect()->back()->with('flash_message_success','Please confirm your email to activate your account!');     







        	if(Auth::attempt(['email' => $data['email'],'password'=>$data['password'],'status'=>'1'])){
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your account has been disabled! Please contact admin');
                }
        			Session::put('frontSession',$data['email']);
                    if(!empty(Session::get('session_id'))){
                        $session_id = Session::get('session_id');
                        DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                    }
        		return redirect()->back()->with('flash_message_success','Successfully Signed up! Happy Shopping!');        }
      }
  }
}

public function login(Request $request){
    if($request->isMethod('post')){
    	$data = $request->all();
    	if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    		Session::put('frontSession',$data['email']);
    		return redirect('/cart');
    	}
    	else{
    		return redirect()->back()->with('flash_message_error','Invalid Email or Password');
    	}
    }
}

 public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','Please enter your Name to update your account details!');    
            }

            if(empty($data['address'])){
                $data['address'] = '';    
            }

            if(empty($data['city'])){
                $data['city'] = '';    
            }

            if(empty($data['state'])){
                $data['state'] = '';    
            }

            if(empty($data['country'])){
                $data['country'] = '';    
            }

            if(empty($data['pincode'])){
                $data['pincode'] = '';    
            }

            if(empty($data['mobile'])){
                $data['mobile'] = '';    
            }

            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Your account details has been successfully updated!');
        }

        return view('users.account')->with(compact('countries','userDetails'));
    }


    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<prev>"; print_r($data); die;
            $old_pwd = User::where('id',Auth::User()->id)->first();
            $current_pwd = $data['current_pwd'];
            if(Hash::check($current_pwd,$old_pwd->password)){
                //Update password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return back()->with('flash_message_success', 'Password updated successfully!'); 

            }else{
                return redirect()->back()->with('flash_message_error','The current password is incorrect');
            }
        }
    }


public function confirmAccount($email){
     $email = base64_decode($email);
     $userCount = User::where('email',$email)->count();
     if($userCount > 0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login-register')->with('flash_message_success','Your Email account is already activated. You can login now!');
            }
     
     else{
        User::where('email',$email)->update(['status'=>1]);
                // Send Welcome Email
                $messageData = ['email'=>$email,'name'=>$userDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to Rosa Website');
                });
        return redirect('login-register')->with('flash_message_success','Your Email account is now activated. You can login now!');
     }
 }
}

 public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

$usersCount = User::where('email',$data['email'])->count();
         if($usersCount == 0){
            return redirect()->back()->with('flash_message_error','Email does not exists!');
         }

         //Get user details
         $userDetails = User::where('email',$data['email'])->first();
          
          //Generate random password to the user's email

         $random_password = str::random(8); 

         //Encode/Secure Password

        $new_password = bcrypt($random_password); 

        //Update password

        User::where('email',$data['email'])->update(['password'=>$new_password]);


        //Send Forgeot Password to email

        $email = $data['email'];
        $name = $userDetails->name;
        $messageData = ['email'=>$email,'name'=>$name,'password'=>$random_password];

        Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
             $message->to($email)->subject('New Password - ShopUs');
        });

        return redirect('/login-register')->with('flash_message_success','Please check your email to get your new password.');




        }
        return view('users.forgot_password');
    }











public function logout(){
	Auth::logout();
	Session::forget('frontSession');
	return redirect('/login');
}




}
