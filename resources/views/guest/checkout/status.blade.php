<x-guest-layout>  
@if(session()->has('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
       @else
         <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
               {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div>
                   <a href="/" class="btn btn-primary">Back to Checkout</a>
                </div>
              </div>
          @endif
</x-guest-layout>

