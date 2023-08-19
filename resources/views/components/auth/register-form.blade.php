<div class="form-signin w-20 m-auto bg-body-tertiary">

<form method="POST" action="{{ route('register') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <!-- Email Address -->
    <div class="form-floating">
        <x-auth.text-input id="name" class="form-control t__top" type="email" name="name" :value="old('name')"
                           required autofocus autocomplete="name"/>

        <x-auth.input-label for="name" :value="__('Name')"/>
        <x-auth.input-error :messages="$errors->get('Name')" class=""/>

    </div>


    <!-- Email Address -->
    <div class="form-floating">
        <x-auth.text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                           required autofocus autocomplete="email"/>


        <x-auth.input-label for="email" :value="__('Email')"/>
        <x-auth.input-error :messages="$errors->get('email')" class=""/>

    </div>


    <!-- Password -->
    <div class="form-floating">
        <x-auth.text-input id="password" class="form-control "
                           type="password"
                           name="password"
                           required autocomplete="current-password"/>

        <x-auth.input-label for="password" :value="__('Password')"/>

        <x-auth.input-error :messages="$errors->get('password')" class=""/>

    </div>



    <!-- Confirm Password -->


    <!-- Password -->
    <div class="form-floating">
        <x-auth.text-input id="password_confirmation" class="form-control t__bottom"
                           type="password"
                           name="password_confirmation"
                           required autocomplete="new-password"/>

        <x-auth.input-label for="password_confirmation" :value="__('Confirm Password')"/>

        <x-auth.input-error :messages="$errors->get('password_confirmation')" class=""/>

    </div>






    <div class="flex items-center justify-end m-3">
        <a class="" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
    </div>

        <x-auth.primary-button class="ml-4">
            {{ __('Register') }}
        </x-auth.primary-button>

</form>
</div>
