<!DOCTYPE html>
<html lang="en">
<head>
    <title>SHORTEN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>
<body >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/"><h2 class="text-warning">SHORTEN</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mob-navbar" aria-label="Toggle">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mob-navbar">
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item  ">
                        @if ('/'== request()->path())       
                        <a class="nav-link active  " aria-current="page" href="#">Home</a>
                        @else
                        <a class="nav-link " href="{{url('/')}}">Home</a>
                        @endif
                    </li>
                    <li class="nav-item">  
                        @if ('/'== request()->path())                    
                        <a class="nav-link " href="#create">Create</a>
                       @else
                        <a class="nav-link " href="{{url('/')}}">Create</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ('/'== request()->path())                    
                        <a class="nav-link" href="#about_us">About Us</a>
                       @else
                        <a class="nav-link" href="{{url('/')}}"></a>
                        @endif
                    </li>
                </ul>
                @if(Auth::check())
                <span class="text-white px-2">Welcome, </span>
                    <div class="dropdown">
                        <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" href="{{route('profile.index')}}">Profile Setting</a></li>
                          <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>

                          <li> <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item" >{{ __('Log Out') }}</button>
                        </form></li>
                        </ul>
                      </div>
                @else
                    
                <form class="d-flex" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input class="form-control me-2" type="email" placeholder="Email"  name="email" :value="old('email')" required autofocus/>
                    <input class="form-control me-2" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                    <button class="btn btn-warning" type="submit">Login</button>
                </form>
               <div class="justify-content-end px-2">
                @if (Route::has('password.request'))
                <a href= "{{ route('password.request') }}" class="btn btn-warning ">Forget Password </a>
                @endif 
                <a href= "{{ route('register') }}" class="btn btn-warning">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- header-->
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
      <div class="container">
       <div class="d-sm-flex align-items-center justify-content-between">
         <div>
         <h1>Easily shorten <span class="text-warning"> your link</span></h1>
         <p class="lead my-4">
          A URL shortener built with powerful tools to help you grow and protect your brand. 
         </p>
        </div>
         <img  class="img-fluid w-50 d-none d-sm-block" src="{{asset('assets/img/showcase.svg')}}" alt="link">
         <div id="create"></div>
       </div>
      </div>
    </section>
    
    {{ $slot }}
        <!-- Footer -->

        <footer class="p-5 text-white bg-dark text-center position-relative">
            <div class="container">
    
                    <div class="p-3">
                        <a href="https://www.facebook.com/moh.elkurd/"><i class="bi bi-facebook  mx-1"></i></a>
                        <a href="https://twitter.com/Moh_Elkurd"><i class="bi bi-twitter  mx-1"></i></a>
                        <a href="https://www.linkedin.com/in/mohammed-el-kurd-779b8454/"><i class="bi bi-linkedin  mx-1"></i></a>
                        <a href="https://api.whatsapp.com/send/?phone=972598190263&text&app_absent=0"><i class="bi bi-whatsapp  mx-1"></i></a>
                        </div>
                        <h3 class="text-warning">SHORTEN</h3>
                        <p class=" text-warning">A URL shortener built with powerful tools to help you grow and protect your brand. 
                        </h3>
                        <p class="lead">Copyright &copy; 2021 Mohammed A.Elkurd - All rights reserved.</p>
                        <a href="#" class="position-absolute bottom-0 end-0 p-5">
                            <i class="bi bi-arrow-up-circle h1"></i>
                        </a>
            </div>
        </footer>
        <!-- Bootstrap JS -->
        <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>