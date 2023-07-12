<x-guest-layout>

    <x-slot name="title">{{ __('Login') }}</x-slot>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mb-3">
        @csrf

        <div class="fw-bold">
            <a href="{{ route('login') }}">
                <x-application-logo width="72" height="75" />
            </a>
        </div>
        <p class="text-black-50 mb-5">Please enter your login and password!</p>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="name@example.com"
                required autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" placeholder="*******" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <p class="small mb-3">
            @if (Route::has('password.request'))
            <a class="text-primary" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
            </a>
            @endif
        </p>
        <div class="d-grid">
            <x-primary-button class="ml-3 text-uppercase">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div>
        <p class="mb-0  text-center">Don't have an account?
            <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Sign
                Up</a>
        </p>
    </div>
</x-guest-layout>