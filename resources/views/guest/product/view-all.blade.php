<x-guest-layout>    
    <div class="content">
    
		<div class="container">
			<div class="thickline"></div>
		</div>
		
    
    	<nav class="breadcrumb container">
		  <a class="breadcrumb-item" href="#">Home</a>
		  <span class="breadcrumb-item active">Products</span>
		</nav>

	<div class="container">

		<div class="row">
			
			<section class="col-9 products" data-products="limit:4 page:0 id:1679,807,786,1597">
				<h2>All Games</h2>
				
				<div class="row">

	@foreach ($products as  $product)
				<div class="col-md-3" data-product>
				
					<article class="product">
					
						<a href="{{ route('view', $product->id) }}" data-url>
							<img src="{{ asset('storage/' . $product->images->first()->image) }}" class="img-fluid p-3" data-img>
						</a>
					
						<h3>
							<a href="{{ route('view', $product->id) }}" data-product-url data-name data-url>{{$product->name}}</a>
						</h3>
						
						<div class="prce">
							<span class="currency" data-currency>$</span> <span data-price>{{$product->price}}</span>
						</div>
						
						
						<div class="btn-group">
						  <button type="button" class="btn btn-sm btn-secondary" onclick="event.preventDefault(); 
     document.getElementById('addtocart').submit();"data-product-cart-url>
							  <i class="fa fa-shopping-cart"></i> Buy Now
						  </button>


					<form id="addtocart" action="{{ route('cart-add') }}" method="POST" style="display:none;">
    @csrf
        <input type="hidden" name="cart" value="{{$product->id}}">
    </form>
						</div>
						
						
					</article><!-- product -->

					
				</div> <!-- col-md -->
					@endforeach
					
				</div><!-- row -->
				<div class="pagination mt-3">
    {{ $products->links('pagination::bootstrap-4') }}
</div>
			</section> <!-- products -->
			
			
		
		</div>
    </div>
    
    </div>
    
 @include('components.footer')
</div>    
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
    $('#product-tabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
    </script>
    <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script -->
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 </x-guest-layout>
