<x-app-layout>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$product->name}}</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             <div class="card mb-3">
                <div class="col-md-4">
               @if ($product->images->isNotEmpty())
    <img src="{{ asset('storage/' . $product->images->first()->image) }}" class="img-fluid rounded-start" alt="Product Image">
@else
    <p>No image available for this product.</p>
@endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                  	<h1>{{$product->name}}</h1>
                  	<br> ${{$product->price}}</h5>
                  <p class="card-text">Tags: {{ $product->tags->pluck('name')->join(', '); }}</p>
                </div>
              </div>
         
            </div>
          </div>
		<div class="card-footer">
			
			<a href="{{ route('product-index') }}" class="btn btn-secondary mx-2">Cancel</a>
			<a href="{{ route('product-edit', $product->id) }}" class="btn btn-primary mx-2 ">Edit</a>
			<a href="{{ route('product-delete', $product->id) }}" class="btn btn-danger mx-2"data-bs-toggle="modal" data-bs-target="#basicModal">Delete</a>
		</div>
        </div>
        <x-delete-modal>
        	<h5> Are you sure you want to delete {{$product->name}} </h5>
        	 <div class="modal-body">
        	<form  method="POST" action="{{ route('product-delete', $product->id) }}">
        		 @csrf
                 @method('DELETE')
                   </div>
                 <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>	
        	</form>
        </x-delete-modal>
      </div>
  </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</x-app-layout>