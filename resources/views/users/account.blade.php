<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Animations!</title>
    <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/new.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/frontend_css/bootstrap.min.css') }}" rel="stylesheet">
   
  </head>
  <body> 

   <header>
       
            <div class="first-nav navbar-fixed" style="background-color: black; width: 100%; height: 70px"> 
            <div class="navbar">
                <div class="menu-toggle">
                    <i class="fa fa-bars"></i>
                    <i class="fa fa-times"></i>
                </div>
                <div class="left-menu" style="margin-left: 1rem">
                <a href="{{ url('/') }}" class="logo"><img src="{{ asset('images/frontend_images/ROS-removebg-preview.png') }}" style="width: 140px; height: 200px; max-width: 100%;"></a>
              
                    
            </div>
                <ul class="nav-list">
                   
                    <li class="nav-item" style="display: flex; ">
                        <i class="fa fa-star" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem"></i>&nbsp;&nbsp; 
<a class="nav-link" href="#">Wishlist</a>
                    </li>
                    <li class="nav-item" style="display: flex; ">
                        <i class="fa fa-cog" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem"></i>&nbsp;&nbsp; 
<a class="nav-link" href="#">Checkout</a>
                    </li>
                    <li class="nav-item" style="display: flex; ">
                        <i class="fa fa-shopping-cart" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem"></i>&nbsp;&nbsp; 
<a class="nav-link" href="#">My Cart</a>
                    </li>

                    @if(empty(Auth::check()))
                         <li class="nav-item" style="display: flex; ">
                        <i class="fa fa-lock" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem"></i>&nbsp;&nbsp; 
<a class="nav-link" href="{{ url('/login-register') }}">Login</a>
                    </li>
                    @else
                     <li class="nav-item" style="display: flex; ">
                        <i class="fa fa-user" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem;"></i>&nbsp;&nbsp; <a class="nav-link" href="#">Account</a>
                    </li>
                    <li class="nav-item" style="display: flex; ">
                        <i class="fa fa-lock" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem;"></i>&nbsp;&nbsp; <a class="nav-link" href="{{ url('/user-logout') }}">LogOut</a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
        </div>
    </header>

<section id="form" style="margin-top: 3rem; margin-bottom: 3rem "><!--form-->
        <div class="container">
            <div class="row">
                  @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color: lightgrey">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
          @endif   
           @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block" style="background-color: lightgrey">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
          @endif   
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Update your account</h2>
                                                <form id="accountForm" name='accountForm' action="{{ url('/account') }}" method="post"> {{csrf_field()}}
                            <input id="name" name="name" value="{{ $userDetails->name }}" type="text" placeholder="Name" required="" />
                            <input id="address" name="address" value="{{ $userDetails->address }}" type="text" placeholder="Address" required="" />
                            <input id="city" name="city" value="{{ $userDetails->city }}" type="text" placeholder="City" required="" />
                            <input id="state" name="state" value="{{ $userDetails->state }}" type="text" placeholder="State" required="" />
                           
                            <select id="country" name="country" required="" style="margin-bottom: 1rem; border:none; outline: none;">
                            <option value="">Select Country</option>
                             @foreach($countries as $country)
                             <option value="{{ $country -> country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                             @endforeach
                        </select>
                        
                          <input value="{{ $userDetails->pincode }}" id="pincode" name="pincode" type="number" placeholder="Pincode" required="" />
                            <input value="{{ $userDetails->mobile }}" id="mobile" name="mobile" type="number" placeholder="Mobile" required="" />



                            <button type="submit" class="btn btn-default">Update Account</button>
                        </form>
                      
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Update Password</h2>
                       <form id="passwordForm" name="passwordForm" action="{{url('/update-user-pwd') }}" method="post">{{csrf_field()}}
                        <input type="password" name="current_pwd" id="current_pwd" placeholder="Your Current Password">
                        <input type="password" name="new_pwd" id="new_pwd" placeholder="Your New Password">
                        <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
                        <button type="submit" class="btn btn-default">Update Password</button>
                       </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->







    

    

    <footer class="footer">
        <div class="container">
            <div class="back-to-top">
                <a href="#hero"><i class="fa fa-chevron-up"></i></a>
            </div>
            <div class="footer-content">
                <div class="footer-content-about animate-up">
                    <h4>About Rosa</h4>
                    <div class="asterisk"><i class="fa fa-asterisk"></i></div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum laboriosam quidem fuga praesentium! Impedit voluptatibus ad reprehenderit debitis ipsam vitae at, incidunt corrupti, dolor, 
                        nulla deserunt consequuntur ipsum rerum pariatur!</p>
                </div>
                <div class="footer-content-divider animate-bottom">
    
                    <div class="social-media">
                        <h4>Follow along</h4>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="newsletter">
                        <h4>Newsletter</h4>
                        <form action="" class="newsletter-form">
                            <input type="text" class="newsletter-input" placeholder="Your email address">
                            <button class="newsletter-btn" type="submit">
                                <i class="fa fa-envelope"></i>
                            </button>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    </footer>







    <script src="{{ asset('js/frontend_js/jquery.js') }}"></script>
    <script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/frontend_js/main.js') }}"></script>
        
<script src="https://unpkg.com/scrollreveal"></script>

 <script src="{{ asset('js/frontend_js/bootstrap.min.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('js/frontend_js/script.js') }}"></script>
  </body>
</html>