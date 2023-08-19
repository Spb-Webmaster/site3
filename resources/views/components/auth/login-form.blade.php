<div class="form-signin w-20 m-auto bg-body-tertiary">
<!-- Session Status -->
<x-auth.auth-session-status class="mb-4" :status="session('status')"/>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <!-- Email Address -->
    <div class="form-floating">
        <x-auth.text-input id="email" class="t__top form-control" type="email" name="email" :value="old('email')"
                           required autofocus autocomplete="email"/>
        <x-auth.input-label for="email" :value="__('Email')"/>
        <x-auth.input-error :messages="$errors->get('email')" class=""/>
    </div>


    <!-- Password -->
    <div class="form-floating">
        <x-auth.text-input id="password" class="t__bottom form-control"
                           type="password"
                           name="password"
                           required autocomplete="current-password"/>
        <x-auth.input-label for="password" :value="__('Password')"/>

        <x-auth.input-error :messages="$errors->get('password')" class=""/>
    </div>





    @if (Route::has('password.request'))
        <a class=""
           href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif



    <!-- Remember Me -->

    <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="remember_me">
        <label class="form-check-label" for="remember_me">
            {{ __('Remember me') }}
        </label>
    </div>



    <div class="flex items-center justify-end mt-4">

        @if (Route::has('password.request'))
            <a class=""
               href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-auth.primary-button class="ml-3">
            {{ __('Log in') }}
        </x-auth.primary-button>

    </div>

    <p class="mt-5 mb-3 text-body-secondary">© 2017–{{ date("Y") }}</p>

    </form>
</div>



