<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="login-form">
        <h4>Register to Administration</h4>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" placeholder="User Name" 
                id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Email" 
                id="email" name="email" :value="old('email')" required autocomplete="username" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" 
                id="password" name="password" required autocomplete="new-password" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
                <!-- Confirm Password -->

                <div class="form-group">
                <label for="password_confirmation" >Confirm Password</label>
                <input type="password" class="form-control" placeholder="Password" 
                id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Agree the terms and policy 
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
            {{-- <div class="social-login-content">
                <div class="social-button">
                    <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Register with facebook</button>
                    <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Register with twitter</button>
                </div>
            </div> --}}
            <div class="register-link m-t-15 text-center">
                <p>Already have account ? <a href="/login"> Sign in</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
