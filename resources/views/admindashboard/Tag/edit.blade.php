<x-app-layout>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-center mb-5">Edit Product Form Page</h1>
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Product</h5>

              <!-- Multi Columns Form -->
                <form class="row g-3 needs-validation" method="POST" action="{{ route('tag-update', $tag->id) }}">
                       @csrf
                       @method('PUT')

                    <div class="col">
                      <label for="tagName"class="form-label">Tag Name</label>
                      <input type="text" name="name" class="form-control" id="tagname"  value="{{ old('name', $tag->name) }}" required autocomplete="productName">
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
               
                    </div>
                    <div class="modal-footer">
                     <a href="{{ route('tag-index') }}" class="btn btn-danger mx-2">Cancel</a>
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