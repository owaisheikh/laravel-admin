<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="login-form">
        <h4>Administratior Login</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email"
                id="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password"
                id="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="checkbox">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
                <label class="pull-right">
                    <a href="/forgot-password">Forgotten Password?</a>
                </label>
            </div>
                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
            <div class="register-link m-t-15 text-center">
                <p>Don't have account ? <a href="/register"> Sign Up Here</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
