<x-app-layout>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-center mb-5">Edit Product Form Page</h1>
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Product</h5>

              <!-- Multi Columns Form -->
                <form class="row g-3 needs-validation" method="POST" action="{{ route('product-update', $product->id) }}" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')

                    <div class="col">
                      <label for="productName"class="form-label">Product Name</label>
                      <input type="text" name="name" class="form-control" id="productname"  value="{{ old('name', $product->name) }}" required autocomplete="productName">
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>


                    <div class="col">
                      <label for="productPrice" class="form-label">Price</label>
                      <div class="input-group has-validation">
                        <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}"  autocomplete="productPrice"required>
                       <x-input-error :messages="$errors->get('price')" class="mt-2" />
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="Tags"   class="form-label">Tag</label>
                      <div class="input-group has-validation">
                        <input type="text" name="tags" class="form-control" value="{{ $product->tags->pluck('name')->join(', '); }}" autocomplete="producttag"required>
                       <x-input-error :messages="$errors->get('tag')" class="mt-2" />
                      </div>
                    </div>

                       <div class="col-12">
                      <label for="Image" :value="__('Image')" class="form-label">Image</label>
                      <div class="input-group has-validation">
                        <input type="file" name="image" class="form-control" id="productimage" >
                       <x-input-error :messages="$errors->get('image')" class="mt-2" />
                      </div>
                    </div>
               
                    </div>
                    <div class="modal-footer">
                     <a href="{{ route('product-index') }}" class="btn btn-danger mx-2">Cancel</a>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                         </form>

            </div>
          </div>

     
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      </div>
    </section>

  </main><!-- End #main -->
</x-app-layout>