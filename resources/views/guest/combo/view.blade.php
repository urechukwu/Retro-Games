<x-guest-layout>
    
    <div class="content">
		
		<div class="container">
			<div class="thickline"></div>
		</div>
		
    
    	<nav class="breadcrumb container">
		  <a class="breadcrumb-item" href="/">Home</a>
		   <a class="breadcrumb-item" href="/combo-all">Combos</a>
		  <span class="breadcrumb-item active">{{$combo->name}}</span>
		</nav>



	    <article class="product-details container" data-component-product>
			
			<div class="row">

				<!-- gallery and tabs column -->
		
				<div class="col-md-8">
					
					<div class="zoom-gallery row">

					<ul class="list-unstyled product-gallery col-md-2">
						@foreach ($combo->products as $product)
						<a href="{{ route('view', $product->id) }}">
						@foreach ($product->images as $images)
						<li class="list-item">
						<img src="{{ asset('storage/' . $images->image) }}" class="img-fluid">
							@endforeach
							@endforeach
						</li>
						</a>
					</ul>
<div class="col-md-10">
							<img src="{{ asset('storage/' . $combo->image) }}" class="img-fluid" data-image>
					</div>

					
					</div>

	
				</div>


					<!-- product name and add to cart -->
				
				<div class="col-md-4 mt-2">
					<h1 class="product-heading" data-name>{{ $combo->products->pluck('name')->join(' & '); }}</h1>
					
					<!-- product attributes -->
					<ul class="list-unstyled text-muted">
					  <li>Tags: <span>
@foreach($combo->products as $product)
					  	{{ $product->tags->pluck('name')->join(', '); }}
					  @endforeach</span></li>

					</ul>
					
					<div class="old-price">
						<span class="currency" data-currency>₦</span> <span data-price>{{$combo->price + '1000'}}</span>
					</div>
					
					<div class="price h3">
						<span class="currency" data-currency>₦</span> <span data-price>{{$combo->price}}</span>
					</div>
					
					<hr>
					 
					<button type="button" class="btn btn-outline-secondary btn-block  btn-icon"onclick="event.preventDefault(); 
     document.getElementById('addtocart').submit();">
						 <i class="la la-shopping-cart"></i> Buy now
					</button>

					<form id="addtocart" action="{{ route('combo-add') }}" method="POST" style="display:none;">
    @csrf
        <input type="hidden" name="cart" value="{{$combo->id}}">
    </form>
				</div>

			</div>	    
		

			<div class="product-tabs clearfix" role="tabpanel">
				  <ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Description</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false">Specification</a>
					</li>
				  </ul>
				  <div class="tab-content" id="myTabContent">
					<div role="tabpanel" class="tab-pane fade active show" id="home" aria-labelledby="home-tab" aria-expanded="true" data-description>
					  <p>{{$combo->description}}</p>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
					 <p>See Individual Games spec here 
@foreach($combo->products as $product)
<a href="{{ route('view', $product->id) }}">{{$product->name}}</a> 
@endforeach
					 </p>
					</div>
				  </div>
				</div>

		
	    </article><!-- product-details -->	
<div class="container products-tab-carousel">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">More Games</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <section class="container products clearfix" data-component-products="limit:4 page:0 id:1679,807,786,1597" data-products='{"1": "Mac pro", "2":"Ipod"}'>
                <div class="owl-carousel owl-theme">
                    @foreach ($suggestedCombos as $suggestedCombo)
                        <div class="item" data-product>
                            <article class="product">
                                <a href="{{ route('view-combo', $suggestedCombo->id) }}" data-url>
                                        <img src="{{ asset('storage/' . $suggestedCombo->image) }}" class="img-fluid rounded-start" alt="Product Image">
                                </a>
                                <h3>
                                    <a href="{{ route('view-combo', $suggestedCombo->id) }}" data-product-url data-name data-url>{{ $suggestedCombo->name }}</a>
                                </h3>
                                <div class="price-group">
                                    <div class="old-price">
                                        <span class="currency" data-product-currency>₦</span> 
                                        <span data-product-price>{{ $suggestedCombo->price + 500 }}</span>
                                    </div>
                                    <div class="price">
                                        <span class="currency" data-product-currency>₦</span> 
                                        <span data-product-price>{{ $suggestedCombo->price }}</span>
                                    </div>
                                </div>
                                <div class="btngroup">
                                      <button type="button" 
                   onclick="event.preventDefault(); document.getElementById('buy-combo-{{ $suggestedCombo->id }}').submit();" 
                   class="btn btn-sm btn-secondary" 
                   title="Buy Now" 
                   data-product-cart-url 
                   data-vvveb-action="addCart" 
                   data-product_id="{{ $suggestedCombo->id }}">
                    <i class="la la-shopping-cart"></i> Buy Now
                </button>
                <form id="buy-combo-{{ $suggestedCombo->id }}" action="{{ route('combo-add') }}" method="POST" style="display:none;">
                    @csrf
                    <input type="hidden" name="cart" value="{{$suggestedCombo->id }}">
                </form>
                                </div>
                            </article><!-- product -->
                        </div> <!-- item -->
                    @endforeach
                </div><!-- owl-carousel -->
                <div class="d-grid gap-2 mt-3 text-center">
                    <a href="/combo-all" class="btn btn-outline-secondary btn-md">See All</a>
                </div>
            </section> <!-- products -->
        </div>
    </div>
</div>

    
    </div>
     @include('components.footer')
    
</div>    
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
   <script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
    $('#product-tabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

	$(document).ready(function() {
		$('.zoom-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			closeOnContentClick: false,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			image: {
				verticalFit: true,
				titleSrc: function(item) {
					return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
				}
			},
			gallery: {
				enabled: true
			},
			zoom: {
				enabled: true,
				duration: 300, // don't foget to change the duration also in CSS
				opener: function(element) {
					return element.find('img');
				}
			}
			
		});
	});

	$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop: true,           // Enable looping of the images
    margin: 10,           // Margin between the images
    nav: true,            // Show next/prev buttons
    dots: true,           // Enable navigation dots
    items: 1,   
     navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],  
    responsive: {
        0: {
            items: 1    // On mobile, show one image per slide
        },
        600: {
            items: 1    // On medium screens, show one image per slide
        },
        1000: {
            items: 1    // On large screens, show one image per slide
        }
    }
  });
});

	$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        items: 1, 
        navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],
        responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 1 }
        }
    });
});
    </script>	
    
    <style>
			
		.image-source-link {
			color: #98C3D1;
		}

		.mfp-with-zoom .mfp-container,
		.mfp-with-zoom.mfp-bg {
			opacity: 0;
			-webkit-backface-visibility: hidden;
			/* ideally, transition speed should match zoom duration */
			-webkit-transition: all 0.3s ease-out; 
			-moz-transition: all 0.3s ease-out; 
			-o-transition: all 0.3s ease-out; 
			transition: all 0.3s ease-out;
		}

		.mfp-with-zoom.mfp-ready .mfp-container {
				opacity: 1;
		}
		.mfp-with-zoom.mfp-ready.mfp-bg {
				opacity: 0.8;
		}

		.mfp-with-zoom.mfp-removing .mfp-container, 
		.mfp-with-zoom.mfp-removing.mfp-bg {
			opacity: 0;
		}

    </style>
 </x-guest-layout>

