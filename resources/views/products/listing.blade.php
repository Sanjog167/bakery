@extends('layouts.frontLayout.front_design')
@section('content')

  <section class="hero" id="hero">

        <div class="container">
            <h2 class="sub-headline">
                <span class="first-letter">W</span>elcome
            </h2>
            <h1 class="headline">
                The Rosa
            </h1>
            <div class="headline-description">
                <div class="separator">
                    <div class="line line-left"></div>
                    <div class="asterisk"><i class="fa fa-asterisk"></i></div>
                    <div class="line line-right"></div>
                </div>
                <div class="single-animation">
                    <h5>Ready to be opened</h5>
                    <a class="btn cta-btn" href="#dos">Explore</a>

                </div>
            </div>
        </div>

    </section>
    <!--hero ends-->

    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                                @foreach($categories as $cat)
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{ $cat->name }}
										</a>
									</h4>
								</div>

								<div id="{{ $cat->id }}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
                                            @foreach($cat->categories as $subcat)
											<li><a href="{{ $subcat->url }}">{{ $subcat->name }}</a></li>
											@endforeach
										</ul>
									</div>
								</div>
                                @endforeach
							</div>
						
						
						</div><!--/category-products-->
					
						
						
						
					
					</div>
                </div>

                <div class="col-sm-9 padding-right" style="margin-top: -2rem;">

                  
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">{{$categoryDetails->name}}</h2>
                            @foreach($productsAll as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                            <div class="productinfo text-center" style="margin-bottom: 2rem">
                                                <img src="{{ asset('images/backend_images/products/medium/'.$product->image) }}" alt=""/>
                                                <h2 class="font-size-20">NPR {{ $product->price }}</h2>
                                                <p>{{ $product->product_name }}</p>
                                                <a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                          
                                    </div>
                                  
                                </div>
                            </div>
                            @endforeach
                           
                            
                            
                        </div> 
                </div>
			</div>
		</div>
    </section>

 

    <section class="discover-our-story" id='dos'>
    <div class= "container">
        <div class="restaurant-info">
            <div class="restaurant-description padding-right animate-left">
                <div class="global-headline">

                    <h2 class="sub-headline">
                        <span class="first-letter">D</span>iscover
                    </h2>
                    <h1 class="headline headline-dark">
                        Our Story
                    </h1>
                    <div class="asterisk"><i class="fa fa-asterisk"></i></div>

                </div>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia totam maiores nisi illum, at, 
                    alias nihil quod blanditiis ipsa quidem numquam sunt rem provident culpa nesciunt nostrum, modi nulla soluta?
                </p>
                <a href="#" class="btn body-btn">About Us</a>
            </div>
            <div class="restaurant-info-img animate-right">
                <img src="{{ asset('/images/frontend_images/pexels-photo-776538.jpeg') }}" alt="">
            </div>
        </div>
    </div>
</section>


<!--discover our story ends-->

<section class="tasteful-recipes between">
    <div class="container">

        <div class="global-headline">
            <div class="animate-top">
            <h2 class="sub-headline">
                <span class="first-letter">T</span>asteful
            </h2>
        </div>
        <div class="animate-bottom"> 
            <h1 class="headline headline-dark">
                Recipes
            </h1>
        </div>
        

        </div>

    </div>
</section>

<section class="discover-our-menu">

    <div class="container">
        <div class="restaurant-info">
            <div class="image-group padding-right animate-left">
                <img src="{{ asset('/images/frontend_images/food1.jpeg') }}" alt="">
                <img src="{{ asset('/images/frontend_images/food1.jpeg') }}" alt="">
                <img src="{{ asset('/images/frontend_images/food1.jpeg') }}" alt="">
                <img src="{{ asset('/images/frontend_images/food1.jpeg') }}" alt="">
            </div>
            <div class="restaurant-description animate-right">

                <div class="global-headline">

                    <h2 class="sub-headline">
                        <span class="first-letter">D</span>iscover
                    </h2>
                    <h1 class="headline headline-dark">
                        Our Menu
                    </h1>
                    <div class="asterisk"><i class="fa fa-asterisk"></i></div>

                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo quod iste doloremque repellat nostrum quas tempora perferendis, 
                    cum maxime voluptatem numquam nesciunt omnis aliquid rem natus fuga porro laudantium quidem?</p>
                <a href="#dos" class="btn body-btn"> View the full menu</a>
            </div>
        </div>
    </div>
</section>

<!--Discover our Menu part ends-->


<section class="perfect-blend between">
    <div class="container">

        <div class="global-headline">
            <div class="animate-top">
            <h2 class="sub-headline">
                <span class="first-letter">T</span>he Perfect
            </h2>
        </div>
        <div class="animate-bottom"> 
            <h1 class="headline headline-dark">
                Blend
            </h1>
        </div>
        

        </div>

    </div>
</section>

<!--Perfect blend ends-->

<section class="culinary-delight">

    <div class= "container">
        <div class="restaurant-info">
            <div class="restaurant-description padding-right animate-left">
                <div class="global-headline">

                    <h2 class="sub-headline">
                        <span class="first-letter">C</span>ulinary
                    </h2>
                    <h1 class="headline headline-dark">
                        Delight
                    </h1>
                    <div class="asterisk"><i class="fa fa-asterisk"></i></div>

                </div>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia totam maiores nisi illum, at, 
                    alias nihil quod blanditiis ipsa quidem numquam sunt rem provident culpa nesciunt nostrum, modi nulla soluta?
                </p>
                <a href="#" class="btn body-btn">Make a reservation</a>
            </div>
            <div class="image-group">
                <img class='animate-top' src="{{ asset('/images/frontend_images/pexels-photo-776538.jpeg') }}" alt="">
                <img class='animate-bottom' src="{{ asset('/images/frontend_images/pexels-photo-776538.jpeg') }}" alt="">
            </div>
        </div>
    </div>
</section>

<!-- culinary delight ends-->











@endsection