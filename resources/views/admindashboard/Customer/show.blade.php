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
                    <h3 class="card-text">Customer Info</h3>
                    <h5>
                      <b>Name:</b> {{ ucfirst($customers->firstName ?? 'N/A') }} {{ ucfirst($customers->lastName) }}<br>
                      <b>Email:</b> {{$customers->email}}<br>
                      <b>Country:</b> {{ ucfirst($customers->country ?? 'N/A') }}<br>
                      <b>Phone Number:</b> {{$customers->phone ?? 'N/A'}}<br>
                    </h5>
                    <br>

                        <div class="activity">
                            <h5 class="card-title">Purchase History</h5>
    @foreach ($customers->sales as $sale)
        <div class="activity-item d-flex mt-2">
            <div class="activite-label">
                <a href="{{ route('sale-show', $sale->id) }}" class="fw-bold text-dark">
                    {{ $sale->created_at->diffForHumans() }}
                </a>
            </div>
            <div class="activity-content mx-3">
                @foreach ($sale->products as $product)
                    <p><a href="{{ route('product-show', $product->id) }}">{{ $product->name }}</a></p>
                @endforeach
            </div>
        </div>
    @endforeach

              </div>

              </div>
              </div>
         
            </div>
          </div>
		<div class="card-footer">
			<a href="{{ route('customer-index') }}" class="btn btn-secondary mx-2">Cancel</a>
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