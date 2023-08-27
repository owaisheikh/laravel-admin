<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="login-form">
        <h4>Reset Password</h4>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
    
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
            <div class="form-group">
                <label for="email" >Email address</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" >Password</label>
                <input type="password" class="form-control" id="password" name="password" required autofocus autocomplete="new-password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" >Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
            <div class="register-link text-center">
                <p>Back to <a href="/dashboard"> Home</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>

                    