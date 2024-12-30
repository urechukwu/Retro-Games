<x-app-layout>
   <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                       @csrf

                    <div class="col-12">
                      <label for="name" :value="__('Username')" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="username" :value="old('name')" autofocus autocomplete="username"required>
                      <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="col-12">
                      <label for="email" :value="__('Email')" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail"  :value="old('email')" required autocomplete="username">
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="col-12">
                      <label for="password" :value="__('Password')" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="text" name="password" class="form-control" id="yourUsername"  autocomplete="new-password"required>
                       <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password_confirmation" :value="__('Confirm Password')" class="form-label"> Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="yourPassword" autocomplete="new-password"required>
                       <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>   
</x-app-layout>
