<div id="top-nav" class="bg-light smaller-font-size text-muted">
        <nav class="navbar-expand-md container px-3">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
    </div>      

    <header class="container mt-5">
        
      <div class="row">
          
        <div class="col-md-3">
            <a href="/" class="logo">
                <!-- img src="img/logo.png"--> 
                <h1 class="text-dark"><i class="text-secondary la la-plug"></i><span>Retr<span class="text-secondary">o.</span></span></h1>
                <small class="text-dark">games shop</small>
                
            </a>
        </div>

        <div class="col-md-5">
           
           <form class="" method="GET" action="{{ route('search') }}">
    @csrf

    <div class="input-group input-group-lg mb-3" id="search-box" data-component-category>
        <input type="text" class="form-control default-font-size" placeholder="Search" name="q" aria-label="Search product" required>
        
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="la la-search"></i></button>
        </div>
    </div>
</form>

            
        </div>

        <div class="col-md-4">
            
            <div class="dropdown float-right" id="mini-cart" data-component-cart>
            
            <div class="dropdown float-right" id="mini-user" data-component-user>
              <a class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-user d-inline-block" style="font-size:42px"></i>&ensp; 

                <div class="d-inline-block text-dark" data-if="login">
                    <span class="small d-block text-left">My account</span>
                    <span class="font-weight-bold">Login/Register</span>
                </div>
                
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href='/register'>Register</a>
                <a class="dropdown-item" href="/login">Login</a>
              </div>
            </div>
            
        </div>
      
      </div>

    
      <nav class="navbar navbar-light bg-white  rounded navbar-expand-md mt-4">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       

        <div class="collapse navbar-collapse" id="containerNavbar">
          <ul class="navbar-nav mr-auto">

           <li class="nav-item active">
              <a href="/request" class="btn btn-primary btn-sm">Request a Game</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Refund Policies</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Support</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
