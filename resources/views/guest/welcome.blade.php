<x-guest-layout>
<div class="page-container">
    <div class="content">
   <div class="container products-tab-carousel">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Arrivals</a>
        </div>
    </nav>
    @if($products->isEmpty())
    <div class="text-center mt-3">
           <h4>No Products on sale yet</h4>
    </div>
    @else
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <section class="container products clearfix" data-component-products="limit:4 page:0 id:1679,807,786,1597" data-products='{"1": "Mac pro", "2":"Ipod"}'>
                <div class="owl-carousel owl-theme">
                    @foreach ($products->sortByDesc('created_at')->take(5) as $product)
                        <div class="item" data-product>
                            <article class="product">
                                <a href="{{ route('view', $product->id) }}" data-url>
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $product->images->first()->image) }}" class="img-fluid rounded-start" alt="Product Image">
                                    @else
                                        <p>No image available for this product.</p>
                                    @endif
                                </a>

                                <h3>
                                    <a href="{{ route('view', $product->id) }}" data-product-url data-name data-url>{{ $product->name }}</a>
                                </h3>
                                <div class="price-group">
                                    <div class="old-price">
                                        <span class="currency" data-product-currency>₦</span> <span data-product-price>{{$product->price + '500'}}</span>
                                    </div>

                                    <div class="price">
                                        <span class="currency" data-product-currency>₦</span> <span data-product-price>{{ $product->price }}</span>
                                    </div>
                                </div>

                                <div class="btngroup">
                                    <a type="button" onclick="event.preventDefault(); document.getElementById('addtocart').submit();" class="btn btn-sm btn-secondary" title="Add to Cart" href="" data-product-cart-url data-vvveb-action="addCart" data-product_id="{{ $product->id }}">
                                        <i class="la la-shopping-cart"></i> Buy Now
                                    </a>

                                    <form id="addtocart" action="{{ route('cart-add') }}" method="POST" style="display:none;">
                                        @csrf
                                        <input type="hidden" name="cart" value="{{ $product->id }}">
                                    </form>
                                </div>
                            </article><!-- product -->
                        </div> <!-- col-md -->
                    @endforeach
                </div><!-- row -->
                <div class="d-grid gap-2 mt-3 text-center">
                  <a href="/product-all" class="btn btn-outline-secondary btn-md">See All</a>
             </div>
            </section> <!-- products -->
        </div>
    </div>
    @endif
</div>

   <div class="container products-tab-carousel">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Value Packs</a>
        </div>
    </nav>
 @if($combos->isEmpty())
    <div class="text-center mt-3">
           <h4>No Combo offer available</h4>
    </div>
    @else
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <section class="container products clearfix" data-component-products="limit:4 page:0 id:1679,807,786,1597" data-products='{"1": "Mac pro", "2":"Ipod"}'>
                <div class="owl-carousel owl-theme">
            @foreach ($combos as $combo)
    <div class="item" data-product>
        <article class="product">
            <a href="{{ route('view-combo', $combo->id) }}" data-url>
                <img src="{{ asset('storage/' . $combo->image) }}" class="img-fluid rounded-start" alt="Product Image">
            </a>
            <h3>
                <a href="{{ route('view-combo', $combo->id) }}" data-product-url data-name data-url>{{ $combo->name }}</a>
            </h3>
            <div class="price-group">
                <div class="old-price">
                    <span class="currency" data-product-currency>₦</span>
                    <span data-product-price>{{ $combo->price + 1000 }}</span>
                </div>
                <div class="price">
                    <span class="currency" data-product-currency>₦</span>
                    <span data-product-price>{{ $combo->price }}</span>
                </div>
            </div>
            <div class="btngroup">
                <button type="button" 
                   onclick="event.preventDefault(); document.getElementById('buy-combo-{{ $combo->id }}').submit();" 
                   class="btn btn-sm btn-secondary" 
                   title="Add to Cart" 
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
                <div class="d-grid gap-2 mt-3 text-center">
                 <a href="/combo-all" class="btn btn-outline-secondary btn-md">See All</a>
             </div>
            </section> <!-- products -->
        </div>
    </div>
    @endif
</div>    
    </div>
    @include('components.footer')
</div>    
</x-guest-layout>





