<x-guest-layout>

    <x-slot name="title">{{ __('Register') }}</x-slot>

    <form method="POST" action="{{ route('register') }}" class="mb-3">
        @csrf

        <div class="fw-bold">
            <a href="{{ route('login') }}">
                <x-application-logo width="72" height="75" />
            </a>
        </div>
        <p class="text-black-50 mb-4">Create a new account!</p>

        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-grid">
            <x-primary-button class="ml-4 text-uppercase">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <div>
        <p class="mb-0  text-center">Already registered?
            <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Login</a>
        </p>
    </div>
</x-guest-layout>