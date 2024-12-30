<x-guest-layout>
<div class="page-container">
    <div class="content">

      <section class="head">
    <div class="container">
        <h2 class="text-center"><span>All results from your search</span></h2>
    </div>
</section>

<div class="clearfix"></div>
<section class="search-box">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 listing-block">
            @forelse ($products as $product)
            <a href="{{ route('view', $product->id) }}">
        <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i>
</div>
              <img class="d-flex align-self-start" src="{{ asset('storage/' . $product->images->first()->image) }}" alt="{{$product->name}}">
              <div class="media-body pl-3">
                <div class="price">{{$product->name}}<small>  <span class="currency" data-product-currency>₦</span>{{ $product->price }}</small></div>
                <div class="address"><p class="card-text">Tags: {{ $product->tags->pluck('name')->join(', '); }}</p></div>
              </div>
            </div>
        </a>
            @empty
            <div class="col-12">
                <h3>Results not found</h3>
            </div>
        @endforelse
        </div>
    </div>
</div>
</section>
    </div>
    @include('components.footer')
</div>    
</x-guest-layout>





