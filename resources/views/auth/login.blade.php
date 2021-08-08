<x-front-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 mb-5">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                    <form>
                      <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" :value="old('email')" required autofocus placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" required autocomplete="current-password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>
        
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="rememberPasswordCheck">
                        <label class="form-check-label" for="rememberPasswordCheck">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                      </div>
                      <div class="d-grid">
                          <button type="submit" class="btn btn-primary btn-login text-uppercase fw-bold">  {{ __('Signin') }} </button>
                      </div>
                      <hr class="my-4">
                      <p class=text-center>OR</p>
                      <div class="d-grid mb-2">
                        <a href="{{ url('login/github') }}" class="btn btn-dark btn-login text-uppercase fw-bold"><i class="bi bi-github  mx-1"></i>Login with github</a>
                      </div>
                      <div class="d-grid mb-2">
                        <a href="{{ url('login/facebook') }}" class="btn btn-primary btn-login text-uppercase fw-bold"><i class="bi bi-facebook  mx-1"></i>Login with facebook</a>
                      </div>
                      <div class="d-grid mb-2">
                        <a href="{{ url('login/google') }}" class="btn btn-danger btn-login text-uppercase fw-bold"><i class="bi bi-google  mx-1"></i>Login with google</a>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>



      {{--   <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container p-5">
            <div class="mb-3">
              <label  class="form-label" :value="__('Email')">Email address</label>
              <input type="email" class="form-control" name="email" :value="old('email')" required autofocus>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label class="form-label" :value="__('Password')">Password</label>
              <input type="password" class="form-control" name="password" required autocomplete="current-password">
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="py-2">
            <button type="submit" class="btn btn-warning">  {{ __('Log in') }} </button>
            </div>
            <div class="form-raw">
                <a href="{{ route('githublogin') }}" class="btn btn-secondary btn-block mb-2">Login with github</a>
            </div>
            <div class="form-raw">
                <a href="" class="btn btn-primary btn-block ">Login with facebook</a>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </div>
        </form> --}}





        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div> --}}
    </x-front-layout>