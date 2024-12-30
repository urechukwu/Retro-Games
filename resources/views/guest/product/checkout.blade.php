<x-guest-layout>
    <div class="content">
    	
		<div class="container">
		
		
			<div class="row">
					<div class="col-12">

				
<div class="container nicocheckout">        

<div>
	<div>
		
		<div class="error"></div>
				
				
		<div class="row box checkout_form">
		    <div class="col-md-6 register_block">
			<div class="row">
				  
				<div class="form-group col-md-12">
					<form id="checkout" action="{{ route('cart-checkout') }}" method="POST">
   							 @csrf>
				<br/>
			    <strong class="clearfix">Your Personal Details(So we can process your order) </strong>
			    </div>
			    			  <div class="form-group required col-md-6">
				    <label class="form-control-label" for="input-payment-firstname">First Name</label>
				    <input name="firstName" placeholder="First Name" id="input-payment-firstname" class="form-control" type="text" :value="old('firstName')" required>
				     <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
				  </div>
				  <div class="form-group required col-md-6">
				    <label class="form-control-label" for="input-payment-lastname">Last Name</label>
				    <input name="lastName" placeholder="Last Name" id="input-payment-lastname" class="form-control" type="text" :value="old('lastName')" required>
				  <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
				  </div>
				  <div class="form-group required col-md-12">
				    <label class="form-control-label" for="input-payment-email">E-Mail</label>
				    <input name="email"placeholder="E-Mail" id="input-payment-email" class="form-control" type="text">
				     <x-input-error :messages="$errors->get('email')" class="mt-2" />
				  </div>
				    <div class="form-group required col-md-6">
				    <label class="form-control-label" for="input-payment-zone">Country</label>
				    <select  name="country"  id="input-payment-zone"class="form-control custom-select"><option value="" :value="old('country')" selected="selected"> --- Please Select --- </option><option value="nigeria">Nigeria</option>
				    	<option value="ghana">Ghana</option></select>
				  </div>
				  <div class="form-group required  col-md-6">
				    <label class="form-control-label" for="input-payment-telephone">Phone No</label>
				    <input name="phone" placeholder="Phone No" id="input-payment-telephone" class="form-control" type="text" :value="old('phone')">
				     <x-input-error :messages="$errors->get('phone')" class="mt-2" />
				  </div> 				  				  				  				  				  			  				  				 
			    	</form>
			 				  				  				  
				</div>
	      </div>
					      
					      
		    <div class="col-md-6">
				
				<div class="your_order">
		    		<strong>You're Buying this Game</strong>
					    <table id="cart_table" class="table table-hover table-bordered" data-cart>
  <thead>
<tr>
  <th class="text-xs-left">Product Name</th>
  <th class="text-xs-right hidden-xs">Unit Price</th>
</tr>
  </thead>
  <tbody>
<tr data-product>
  <td class="text-xs-left"><a href="#" data-url><span data-name>{{$product->name}}</span></a>
	</td>
  <td class="text-xs-right hidden-xs">{{$product->price}}</td>
</tr>
  </tbody>
  <tfoot>
  </tfoot>

</table>
						
												<br>
					  													
					<div class="payment-method"><p>Please select the preferred payment method to use on this order.</p>
<div class="radio">
        
	<label class="custom-control custom-radio">
			  <input id="radio1" class="custom-control-input" name="payment_method" value="pp_express" title="PayPal Express Checkout" type="radio"><span class="custom-control-label"></span>
			  <span class="custom-control-description">PayPal Express Checkout</span>
	</label>
</div>

<div class="radio">

	<label class="custom-control custom-radio">
			  <input id="radio1" class="custom-control-input" name="payment_method"  value="cod" title="Cash On Delivery" type="radio"><span class="custom-control-label"></span>
			  <span class="custom-control-description">Cash On Delivery</span>
	</label>
	        
</div>
</div>
										<div class="buttons clearfix">
					  <div class="float-xs-right">I have read and agree to the <a href="http://agency.nicolette.ro/index.php?route=information/information/agree&amp;information_id=5" class="agree"><b>Terms &amp; Conditions</b></a>					    					    <input name="agree" value="1" type="checkbox">
					    					    &nbsp;
					  </div>
					</div>
							<div>			
					<button class="btn btn-primary mt-2" onclick="event.preventDefault(); 
     document.getElementById('checkout').submit();"> Checkout </button>
   </div>
					</div>
			    </div>
			</div>
		</div>
	</div>		
      </div>	
				
				
					</div>
			</div>


    </div>
    
    </div>
    
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
   <script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- </div> -->
 </x-guest-layout>