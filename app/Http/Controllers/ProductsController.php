<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Session;
use App\Product;
use Illuminate\Support\Facades\Input;
use Image;
use App\ProductsAttribute;
use DB;
use Illuminate\Support\Str;
use App\User;
use App\Country;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;

class ProductsController extends Controller
{
    public function addProduct(Request $request){
            

         if($request->isMethod('post')){
         	$data = $request->all();
         	 // echo "<pre>"; print_r($data); die;
         	$product = new Product;
         	$product->category_id = $data['category_id'];
         	$product->product_name = $data['product_name'];
         	$product->product_code = $data['product_code'];
         	$product->product_color = $data['product_color'];
         	
         	if(!empty($data['description'])){
               $product->description = $data['description'];
         	}else{
               $product->description = '';
         	}
         	$product->price = $data['price'];
         	//image upload
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    //Store image name in products table 
                    $product->image = $filename;

                }
            }








         	$product->save();
         	return redirect('/admin/view-products')->with('flash_message_success','The entry has been added successfully!');
         }   

       $categories = Category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected disabled>Select</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach($sub_categories as $sub_cat){
    			$categories_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
    	return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function viewProducts(){
    	$products = Product::get();
    	foreach($products as $key => $val){
    		$category_name = Category::where(['id'=>$val->category_id])->first();
    		 $products[$key]->category_name = $category_name['name'];
    	}
    	return view('admin.products.view_products')->with(compact('products'));
    }

    public function deleteProduct( $id = null){
    
    		Product::where(['id'=>$id])->delete();
    		return redirect('/admin/view-products')->with('flash_message_success','Product deleted successfully!');
    	
    }

    public function editProduct(Request $request, $id=null){


        if($request->isMethod('post')){
            $data = $request->all();

             if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            } else{
                $filename = $data['current_image'];
            }

                  

              
              
              Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'price'=>$data['price'],'image'=>$filename]);


            return redirect('/admin/view-products')->with('flash_message_success','Product updated successfully!');
        }


       $productDetails = Product::where(['id'=>$id])->first();

       $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id==$productDetails->category_id){
                $selected = "selected";
            }
            else{
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){
                            if($sub_cat->id==$productDetails->category_id){
                $selected = "selected";
            }
            else{
                $selected = "";
            }
                $categories_dropdown .= "<option value= '".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }

       return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }

    public function deleteProductImage($id = null){
        Product::where(['id'=>$id])->update(['image'=>'']);
            return redirect('/admin/view-products')->with('flash_message_success','Product Image has been deleted successfully!');
    }

    public function addAttributes(Request $request, $id = null){

         $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
         $productDetails = json_decode(json_encode($productDetails));
          //= echo "<pre>"; print_r($productDetails); die;
        if($request->isMethod('post')){
            $data = $request->all();
           
            foreach ($data['sku'] as $key => $val) {
                if(!empty($val)){

                  //SKU CHECK
                  $attrCountSKU = ProductsAttribute::where('sku',$val)->count();
                  if($attrCountSKU>0){
                    return redirect('admin/add-attributes/'.$id)->with('flash_message_error','SKU already exists!');
                  }
                   //Pound CHECK
                  $attrCountPound = ProductsAttribute::where(['product_id'=>$id,'pound'=>$data['pound'][$key]])->count();
                  if($attrCountPound>0){
                    return redirect('admin/add-attributes/'.$id)->with('flash_message_error','Pound already exists!');
                  }
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->pound= $data['pound'][$key];
                    $attribute->price= $data['price'][$key];
                    $attribute->stock= $data['stock'][$key];
                    $attribute->save();
                }
                return redirect()->back()->with('flash_message_success','The following attribute has been added successfully!');
            }


        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }

    public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Product deleted successfully!');
    }

    public function products($url = null){

       $categories = Category::with('categories')->where(['parent_id'=>0])->get();
     $categoryDetails = Category::where(['url'=>$url])->first();
     $productsAll = Product::where(['category_id'=>$categoryDetails->id])->get();
     return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));


    }

    public function Product($id = null){

      $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
      $productDetails = json_decode(json_encode($productDetails));

      $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->get();
      // $relatedProducts = json_decode(json_encode($relatedProducts));
      // echo "<pre>"; print_r($relatedProducts); die;
      // echo "<pre>"; print_r($productDetails); die;
      return view('products.detail')->with(compact('productDetails','relatedProducts'));
    }

      public function getProductPrice(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
          $proArr = explode("-",$data['idSize']);
          $proAttr = ProductsAttribute::where(['product_id' => $proArr[0], 'pound' => $proArr[1]])->first();
          echo $proAttr->price;       
}


public function addtocart(Request $request){

    $data = $request->all();
    

    if(empty(Auth::user()->email)){
      $data['user_email'] = "";
    }else{
       $data['user_email'] = Auth::user()->email;
    }

     $session_id = Session::get('session_id');
     if(empty($session_id)){

     $session_id = Str::random(40); 
     Session::put('session_id',$session_id);
 }

     $poundArr = explode("-",$data['pound']);

     $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'pound' => $poundArr[1],'session_id' => $session_id])->count();

    if($countProducts>0){
     return redirect()->back()->with('flash_message_error','This product already exists in the cart');
    }

    else{


    
     DB::table('cart')->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
          'product_code' => $data['product_code'],'product_color' => $data['product_color'],
         'price' => $data['price'], 'pound' => $poundArr[1],'quantity' => $data['quantity'], 'user_email' => $data['user_email'],'session_id' => $session_id]);
 }


     return redirect('cart')->with('flash_message_success','The product has been added to cart successfully!');

 



   }


   public function cart(){
   
    if(Auth::check()){
       $user_email = Auth::user()->email; 
        $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
    }
    else{
         $session_id = Session::get('session_id');
         $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
    }
    
   
    foreach($userCart as $key => $product){
        $productDetails = Product::where('id',$product->product_id)->first();
        $userCart[$key]->image = $productDetails->image;
    }
    
    return view('products.cart')->with(compact('userCart'));
   }


   public function deleteCartProduct($id=null){
    DB::table('cart')->where('id',$id)->delete();
    return back()->with('flash_message_success','The product has been deleted successfully!');
   }

  public function updateCartQuantity($id=null,$quantity=null){

        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('flash_message_success','The product quantity has been updated into the Cart!');


    }


public function checkout(Request $request){

    $user_id = Auth::user()->id;
    $user_email= Auth::user()->email;
    $userDetails = User::find($user_id);
    $countries = Country::get();


    $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
    if($shippingCount>0){
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
    }

    //Show user-email in cart table

    $session_id = Session::get('session_id');
        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);


    if($request->isMethod('post')){
        $data = $request->all();

        //Return to checkout page if any field is empty

   

     User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'country'=>$data['billing_country'],'pincode'=>$data['billing_pincode'],'mobile'=>$data['billing_mobile']]);


       if($shippingCount>0){

                //Update Shipping Address
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],'pincode'=>$data['shipping_pincode'],'mobile'=>$data['shipping_mobile']]);

            }else{
                //Add new shipping address
                $shipping = new DeliveryAddress;

                $shipping->user_id = $user_id;
                $shipping->user_email = $user_email;
                $shipping->name = $data['shipping_name'];
                 $shipping->address = $data['shipping_address'];
                  $shipping->city = $data['shipping_city'];
                   $shipping->state = $data['shipping_state'];
                    $shipping->country = $data['shipping_country'];
                     $shipping->pincode = $data['shipping_pincode'];
                      $shipping->mobile = $data['shipping_mobile'];
                      $shipping->save();



            }

            return redirect('/order-review');


      }




    return view('products.checkout')->with(compact('userDetails','countries'));
}

public function orderReview(){
    $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();    
        $shippingDetails =  DeliveryAddress::where('user_id',$user_id)->first();
        $shippingDetails = json_decode(json_encode($shippingDetails));

        $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image= $productDetails->image;
        }
        // echo "<pre>"; print_r($userCart); die;

        return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
    }


public function placeOrder(Request $request){
  if($request->isMethod('post')){
    $data = $request->all();
    $user_id = Auth::user()->id;
    $user_email = Auth::user()->email;

    
    //Get Shipping address of the user
    $shippingDetails = DeliveryAddress::where(['user_email'=>$user_email])->first();

    $order = new Order;
    $order->user_id = $user_id;
    $order->user_email = $user_email;
    $order->name = $shippingDetails->name;
    $order->address = $shippingDetails->address;
    $order->city = $shippingDetails->city;
    $order->state = $shippingDetails->state;
    $order->pincode = $shippingDetails->pincode;
    $order->country = $shippingDetails->country;
    $order->mobile = $shippingDetails->mobile;
        $order->shipping_charges = "0";
    $order->order_status = "New";
     $order->payment_method = $data['payment_method'];
      $order->grand_total = $data['grand_total'];
      $order->save();



      $order_id = DB::getPdo()->lastInsertId();

      $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();

      foreach($cartProducts as $pro){
        $cartPro = new OrdersProduct;
        $cartPro->order_id = $order_id;
        $cartPro->user_id = $user_id;
        $cartPro->product_id = $pro->product_id;
        $cartPro->product_code =  $pro->product_code;
        $cartPro->product_name = $pro->product_name;
        $cartPro->product_color = $pro->product_color;
        $cartPro->product_pound = $pro->pound;
          $cartPro->product_price = $pro->price;
            $cartPro->product_qty = $pro->quantity;
            $cartPro->save();


      }

      Session::put('order_id',$order_id);
      Session::put('grand_total',$data['grand_total']);

      return redirect('/thanks');
  
  }
}

public function thanks(){
  return view('products.thanks');
}





}
