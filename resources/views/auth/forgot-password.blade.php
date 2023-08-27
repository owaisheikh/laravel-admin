<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="login-form">
        <h4>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </h4>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" class="form-control"  name="email" :value="old('email')" required autofocus >
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="flex items-center justify-end mt-4 bg-black" style="">
                <x-primary-button >
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>


            <div class="register-link m-t-15 text-center">
                <p>Remember Password ? <a href="/login"> Sign in</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
