<x-front-layout>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
           <form method="POST" action="{{ route('register') }}" >
            @csrf
            <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 mb-5">
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        <form>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Name</label>
                                <input type="text" name="name" class="form-control" id="floatingInput" :value="old('name')" required autofocus >
                                 </div>

    
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" :value="old('email')" required autofocus placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <label for="floatingPassword" :value="__('Password')">Password</label>
                    <input type="password" name="password" class="form-control" id="floatingPassword" required autocomplete="current-password" placeholder="Password">
            </div>

            <div class="form-floating mb-3">
                <label for="floatingConfirmPassword"  :value="__('Confirm Password')">Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" required autocomplete="current-password" placeholder="Password">
              </div>

              <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4 btn btn-primary">
                    {{ __('Register') }}
                </x-button>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
          </form> 
</div>
</div>
</div>
</div>
</div>
</form> 

    </x-front-layout>