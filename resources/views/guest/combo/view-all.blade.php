<x-guest-layout>    
    <div class="content">
    
		<div class="container">
			<div class="thickline"></div>
		</div>
		
    
    	<nav class="breadcrumb container">
		  <a class="breadcrumb-item" href="#">Home</a>
		  <span class="breadcrumb-item active">Combos</span>
		</nav>

	<div class="container">

		<div class="row">
			
			<section class="col-9 products" data-products="limit:4 page:0 id:1679,807,786,1597">
				<h2>All Combos</h2>
				
				<div class="row">

	@foreach ($combos as  $combo)
				<div class="col-md-3" data-product>
				
					<article class="product">
					
						<a href="{{ route('view', $combo->id) }}" data-url>
							<img src="{{ asset('storage/' . $combo->image) }}" class="img-fluid p-3" data-img>
						</a>
					
						<h3>
							<a href="{{ route('view', $combo->id) }}" data-product-url data-name data-url>{{$combo->name}}</a>
						</h3>
						
						<div class="prce">
							<span class="currency" data-currency>$</span> <span data-price>{{$combo->price}}</span>
						</div>
						
						
						<div class="btn-group">
						<button type="button" 
                   onclick="event.preventDefault(); document.getElementById('buy-combo-{{ $combo->id }}').submit();" 
                   class="btn btn-sm btn-secondary" 
                   title="Buy Now" 
                   data-product-cart-url 
                   data-vvveb-action="addCart" 
                   data-product_id="{{ $combo->id }}">
                    <i class="la la-shopping-cart"></i> Buy Now
                </button>

      <form id="buy-combo-{{ $combo->id }}" action="{{ route('combo-add') }}" method="POST" style="display:none;">
                    @csrf
                    <input type="hidden" name="cart" value="{{ $combo->id }}">
                </form>
						</div>
						
						
					</article><!-- product -->

					
				</div> <!-- col-md -->
					@endforeach
					
				</div><!-- row -->
				<div class="pagination mt-3">
    {{ $combos->links('pagination::bootstrap-4') }}
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
