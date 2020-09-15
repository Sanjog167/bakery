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
            
        
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form">
                            <h2>Billing Address</h2>

                            <div class="form-group">
                            
                                {{ $userDetails->name }}

                            </div>

                            <div class="form-group">
                            
                                    {{ $userDetails->address }}

                            </div>

                            <div class="form-group">
                            
                                    {{ $userDetails->city }}

                            </div>

                            <div class="form-group">
                            
                                    {{ $userDetails->state }}

                            </div>
            

                                 <div class="form-group">
                            
                                    {{ $userDetails->country }}

                            </div>

                            <div class="form-group">
                            
                                    {{ $userDetails->pincode }}

                            </div>

                            <div class="form-group">
                            
                                    {{ $userDetails->mobile }}
                            </div>

                        
                                
                                                        
                            
                        </div>
                    </div>
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Shipping Details</h2>
                            <div class="form-group">
                        
                     <div class="form-group">
                            
                                    {{ $shippingDetails->name }}

                            </div>
                   </div>

                                   <div class="form-group">
                            
                            {{ $shippingDetails->address }}
                            </div>

                            <div class="form-group">
                            
                            {{ $shippingDetails->city }}

                            </div>

                            <div class="form-group">
                            
                            {{ $shippingDetails->state }}
                            </div>

                            <div class="form-group">
                            
                            
                             {{ $shippingDetails->country }}

                            </div>



                            <div class="form-group">
                            
                            {{ $shippingDetails->pincode }}

                            </div>

                            <div class="form-group">
                            
                            {{ $shippingDetails->mobile }}

                            </div>
 
                            
                            
                        </div><!--/sign up form-->
                    </div>
                </div>
        
        </div>
    </section><!--/form-->

    <section id="cart_items" style="margin-top: -200px; ">
        <div class="container">
            

        
            


            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_amount = 0; ?>
                        @foreach($userCart as $cart)
                        <tr>
                            <td class="cart_product" style="margin-right: 10px">
                                <a href=""><img img style="width:100px" src="{{ asset('images/backend_images/products/small/'.$cart->image) }}" alt=""></a>
                            </td>
                            <td class="cart_description">
                            <h4><a href="">{{ $cart->product_name }}</a></h4>
                                <p class="cartpara">Code: {{ $cart->product_code }}</p>
                                <p>Pound(s): {{ $cart->pound }}</p>
                            </td>
                            <td class="cart_price">
                                    <p>NPR {{ $cart->price}}</p>
                            </td>
                        <td class="cart_quantity" >
                                <p style="margin-top: 2rem">{{ $cart->quantity }}</p>
                            </td>
                                <td class="cart_total">
                                <p class="cart_total_price">NPR {{ $cart->price*$cart->quantity }}</p>
                            </td>
                            
                        </tr>
                        <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                        @endforeach

                    
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Cart Sub Total</td>
                                        <td>NPR {{ $total_amount }}</td>
                                    </tr>
                                    
                                    <tr class="shipping-cost">
                                        <td>Shipping Cost</td>
                                        <td>Free</td>                                       
                                    </tr>
                                        <tr class="shipping-cost">
                                        <td>Discount Amount</td>
                                        <td>
                                            @if(!empty(Session::get('CouponAmount')))
                                        NPR {{ Session::get('CouponAmount') }}
                                        @else
                                        0
                                        @endif
                                    </td>                                       
                                    </tr>
                                    <tr>
                                        <td>Grand Total</td>
                                        <td><span>NPR {{$grand_total = $total_amount - Session::get('CouponAmount') }} </span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <form name="paymentForm" id="paymentForm" action="{{ url('/place-order') }}" method="post">{{ csrf_field() }}
                    <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                    
                
            <div class="payment-options">
                    <span>
                        <label> <strong> Select Payment Method: </strong></label>
                    </span>
                    <span>
                        <label><input type="radio" name="payment_method" id="COD" value="COD"> Cash on delivery</label>
                    </span>
                    <span>
                        <label><input type="radio" name="payment_method" id="Paypal" value="Paypal"> Paypal</label>
                    </span>
                        <span style="float:right">
                        <button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();"> Place your order</button>
                    </span>
                </div>
            </form>
        </div>
    </section> <!--/#cart_items-->







    

    

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