<x-front-layout>
    <div class="container">
        <div class="row">
               <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
        <div class="mb-4" >
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->

            <div class="form-floating mb-3">
                <input id="email" type="email" name="email" class="form-control" :value="old('email')" required autofocus >
                <label for="floatingInput" :value="__('Email')">Email address</label>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-login text-uppercase fw-bold">  {{ __('Reset Link') }} </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

    </x-front-layout>
