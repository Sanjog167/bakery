<!--  
 <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">Blooger</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="#">Home</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Category</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Archive</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Pages</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="social text-gray">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>
 -->

  <!--  <header>
       
           
            <div class="navbar">
                <div class="menu-toggle">
                    <i class="fa fa-bars"></i>
                    <i class="fa fa-times"></i>
                </div>
                <div class="left-menu">
                <a href="{{ url('/') }}" class="logo"><img src="{{ asset('images/frontend_images/ROS-removebg-preview.png') }}" style="width: 140px; height: 200px; max-width: 100%;"></a>
              
                    
            </div>
                <ul class="nav-list rightmenu">
                   
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
      
    </header> -->

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