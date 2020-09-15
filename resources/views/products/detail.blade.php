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


       
<form name="addtocartForm" id="addtocartForm" action="{{ url('/add-cart') }}" method="post">{{ csrf_field()}}
    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
    <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
    <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
    <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
    <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
    <section id ="product" style="margin-top: 3rem;">
        <div class="container">
            <div class="row">
                    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color: lightgrey">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
          @endif   

                <div class="col-lg-6 col-md col-sm-6">
                 <img src="{{ asset('images/backend_images/products/medium/'.$productDetails->image) }}" alt="" style="width:400px">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 py-3">
                  
                    <h5 class="font-baloo" style="font-size: 50px; font-weight: bolder; font-family: var(--secondary-font); color:var(--secondary-font-color);">{{ $productDetails->product_name }}</h5>
                    <strong>Treat Yourself!</strong>
                    <div class="d-flex first-one">
                        <div class="rating text-warning font-size-12">
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                        </div>
                        <a href="#" class="px-2 font-rale font-size-14" style="text-decoration: none;">User Rating and Reviews</a>
                    </div>
                    <hr class="m-0">
                     <p>
                     <select id="selSize" name="pound" id="pound" style="margin-bottom: 2rem; width: 225px; color: grey" required="">
                        <option value="">Select the number of pounds</option>
                        @foreach($productDetails->attributes as $pounds)
                        <option value="{{ $productDetails->id }}-{{ $pounds->pound }}">{{ $pounds->pound }}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;
                      <label>Quantity:</label>
                                        <input name="quantity" type="text" value="1" style="width:50px" />
                </p>

                    <div class="secondproductinfo" style="height:5rem; padding-bottom:2rem;">
                    
                        <h2 class="" style="font-size: 50px; font-weight: bold; font-family: var(--secondary-font); color:var(--secondary-font-color);"><span id="getPrice">NPR {{ $productDetails->price }}</span></h2>
                        
                      
                
<button type="submit" class="btn btn-default add-to-cart" id="cartButton" style="padding:0.7rem 2rem; align-items: center; padding-bottom: 2.5rem"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>

                    

                    <div id="policy" class="policy">
                       
                            <div class="return text-center mr-5">
                                <div class="font-size-20 my-2 color-second" style="padding-bottom: 1rem;">
                                    <i class="fa-2x fa fa-retweet border p-3 rounded-pill"></i>
                                </div>
                                <a href="#" class="font-rale font-size-12">Guaranteed Replacement</a>
                            </div>
                            <div class="return text-center mr-5">
                                <div class="font-size-20 my-2 color-second" style="padding-bottom: 1rem;">
                                    <i class="fa-2x fa fa-truck border p-3 rounded-pill"></i>
                                </div>
                                <a href="#" class="font-rale font-size-12">Free Delivery</a>
                            </div>
                            <div class="return text-center mr-5">
                                <div class="font-size-20 my-2 color-second" style="padding-bottom: 1rem;">
                                    <i class="fa-2x fa fa-check border p-3 rounded-pill"></i>
                                </div>
                                <a href="#" class="font-rale font-size-12">Discounted offers on <br> special occasions</a>
                            </div>
                        </div>
                    </div>
                    <hr>

                   

            
        </div>
    </section>
</form>

    <section class="recom">
   <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center" style="padding-bottom: 2rem">Recommended Drools For You</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count=1; ?>
                                @foreach($relatedProducts->chunk(3) as $chunk)
                                <div <?php if($count==1) { ?> class="item active" <?php } else {?> class="item" <?php } ?>>
                                @foreach($chunk as $item)   
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:230px" src="{{ asset('images/backend_images/products/small/'.$item->image) }}" alt="" />
                                                    <h2 class="itemprice" style="padding-top: 6rem">NPR{{ $item->price}}</h2>
                                                                           <div class="rating text-warning font-size-12">
                           <span><i class="fa fa-star"></i></span>
                           <span><i class="fa fa-star"></i></span>
                           <span><i class="fa fa-star"></i></span>
                           <span><i class="fa fa-star"></i></span>
                           <span><i class="fa fa-star"></i></span>
                       </div>
                                                    <p>{{ $item->product_name }}</p>
                                                    <a href="{{ url('product/'.$item->id) }}"> <button type="button" class="btn btn-default add-to-cart" id="cartButton"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                                </div>
                                <?php $count++; ?>
                                @endforeach
                            
                            </div>
                            <div class="arrowsrecom">
                             <a class="left recommended-item-control" style="margin-left: 58.1rem; color: black;" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa-2x fa fa-angle-left" style="padding-top: 2rem"></i>
                              </a>
                              <a class="right recommended-item-control" style="color: black; padding-top: 2rem" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa-2x fa fa-angle-right"></i>
                              </a>     
                              </div>     
                        </div>
                    </div><!--/recommended_items-->
</section>



    

    

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