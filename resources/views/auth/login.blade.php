<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>

        <div class="d-flex flex-column justify-content-between align-items-center mt-4">
            <button type="submit" class="btn login-button mb-3">
                {{ __('Log in') }}
            </button>
            @if (Route::has('password.request'))
                <a class="text-decoration-underline text-white" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        
        @if (Route::has('register'))
        <div class="d-flex justify-content-center align-items-center mt-4 gap-3">
            {{ __('Don\'t have an account?') }}

            <a href="{{ route('register') }}" class="btn btn-light">Register</a>
        </div>
        @endif
    </form>
</x-guest-layout>