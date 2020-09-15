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
                        <i class="fa fa-user" aria-hidden="true" style=" color: var(--secondary-font-color);; margin-top:-0.2rem;"></i>&nbsp;&nbsp; <a class="nav-link" href="{{url('/account') }}">Account</a>
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


<section id="form" style="margin-top: 0"><!--form-->
        <div class="container">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Check Out</li>
                </ol>
            </div>
             @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
          @endif   

           @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color: red">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
          @endif   
            <form action="{{ url('/order-review') }}" method="post">{{csrf_field()}}
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Bill to</h2>

                            <div class="form-group">
                            
                                <input name="billing_name" required="" id="billing_name" @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif type="text" placeholder="Billing Name"  class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name="billing_address" required="" id="billing_address" @if(!empty($userDetails->address)) value="{{ $userDetails->address }}" @endif type="text" placeholder="Billing Address" class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name="billing_city" required="" id="billing_city"  @if(!empty($userDetails->city)) value="{{ $userDetails->city }}" @endif type="text" placeholder="Billing City"  class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name="billing_state" required="" id="billing_state"  @if(!empty($userDetails->state)) value="{{ $userDetails->state }}" @endif type="text" placeholder="Billing State"  class='form-control'/>

                            </div>
            
 
                  <select id="billing_country" required="" name="billing_country" style="margin-bottom: 10px">
                               <option value="">Select Country</option>
                               @foreach($countries as $country)
                               <option value="{{ $country->country_name }}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                               @endforeach
                            </select>

                            <div class="form-group">
                            
                                <input name="billing_pincode" required="" id="billing_pincode"  @if(!empty($userDetails->pincode)) value="{{ $userDetails->pincode }}" @endif type="text" placeholder="Billing Pincode"  class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name="billing_mobile" required="" id="billing_mobile"  @if(!empty($userDetails->mobile)) value="{{ $userDetails->mobile }}" @endif type="text" placeholder="Billing Mobile" class='form-control'/>

                            </div>

                            <div class="form-check">
      <input type="checkbox" required="" class="form-check-input" id="billtoship">
      <label class="form-check-label" for="copyAddress">Same for shipping address</label>
      </div>
                                
                                                        
                            
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Ship To</h2>
                            <div class="form-group">
                        
                       <input name='shipping_name' required="" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif id="shipping_name" type="text" placeholder="Shipping Name" class="form-control">

                   </div>

                                   <div class="form-group">
                            
                                <input name='shipping_address' required="" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif id="shipping_address" type="text" placeholder="Shipping Address"  class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name='shipping_city' required="" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif id="shipping_city" type="text" placeholder="Shipping City" class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name='shipping_state' required="" @if(!empty($shippingDetails->state)) value="{{ $shippingDetails->state }}" @endif id="shipping_state" type="text" placeholder="Shipping State"  class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                            
       <select id="shipping_country" required="" name="shipping_country" class ='form-control' style="margin-bottom: 10px">
                               <option value="">Select Country</option>
                               @foreach($countries as $country)
                               <option value="{{ $country->country_name }}" @if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif>{{ $country->country_name }}</option>
                               @endforeach
                            </select>

                            </div>



                            <div class="form-group">
                            
                                <input name='shipping_pincode' required="" @if(!empty($shippingDetails->pincode)) value="{{ $shippingDetails->pincode }}" @endif id="shipping_pincode" type="text" placeholder="Shipping Pincode"  class='form-control'/>

                            </div>

                            <div class="form-group">
                            
                                <input name='shipping_mobile' required="" @if(!empty($shippingDetails->mobile)) value="{{ $shippingDetails->mobile }}" @endif id="shipping_mobile" type="text" placeholder="Shipping Mobile" class="form-control" />

                            </div>
 
                                <button type="submit" class="btn btn-default">Checkout</button>
                            
                        </div><!--/sign up form-->
                    </div>
                </div>
        </form>
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

