<x-app-layout>

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             <div class="card mb-3">
                <div class="col-md-4">
                <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                   <h5 class="card-text">Sale Info <br>
                      <b>Name:</b> 
                      <a href="{{ route('product-show', $sales->products->first()->id) }}"> {{ucfirst($sales->products->first()->name)}}</a>
                        <br>
                      <b>Price:</b> ${{$sales->products->first()->price}}<br>
                      <b>Date of Sale:</b> {{ $sales->created_at->diffForHumans() }}<br>
                    </h5>
                    <h5 class="card-text">Customer Info <br>
                      <b>Name:</b>
                      <a href="{{ route('customer-show', $sales->customer->id) }}">{{ ucfirst($sales->customer->firstName ?? 'N/A') }} {{ ucfirst($sales->customer->lastName) }}</a>
                       <br>
                      <b>Email:</b> {{ucfirst($sales->customer->email ?? 'N/A')}}<br>
                      <b>Country:</b> {{ ucfirst($sales->customer->country ?? 'N/A') }}<br>
                      <b>Phone Number:</b> {{$sales->customer->phone ?? 'N/A'}}<br>
                    </h5>
                </div>
              </div>
         
            </div>
          </div>
		<div class="card-footer">
			<a href="{{ route('sale-index') }}" class="btn btn-secondary mx-2">Cancel</a>
		</div>
        </div>
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