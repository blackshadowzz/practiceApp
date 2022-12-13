
<x-guest-layout>

    <ul>
        <li><a href="/">Home</a></li>
        
        <li style="float:right"><a class="active" href="{{ route('register') }}">Register</a></li>
    </ul>
    
    <div class="login">
        <div class="login-form">
            <div class="login-header">
                <h4>{{ __('Sign In') }}</h4>
            </div>
            <div class="flex">
                <div class="login-body mt-3">
                    <form class="form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="div-input">
                            <input class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" id="email" name="email" placeholder="Email" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input class="input form-control @error('password') is-invalid @enderror" type="password" required autocomplete="current-password" id="password" name="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="login-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    
                                </div>
                                <div class="fp">
                                    @if(Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                    @endif
                                    
                                </div>
               
                            </div>
                        </div>
                        
                        <div class="">
                            <button type="submit" class="button">LOG IN</button>
                        </div>
                    </form>
                    <div class="footer">
                        <div class="footer-a">
    
                        </div>
                        <div class="footer-b">
                            <span class="footer-text">Don't have an account? </span>
                            <a href="{{ route('register') }}" class="footer-link">{{__('Sign up')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    {{-- <x-auth-card>
        <x-slot name="logo">
            <div class="login-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                
            </div>
        </x-slot> --}}

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-2" :status="session('status')" />

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-3">
                <x-primary-button class="w-full justify-center bg-sky-500 hover:bg-sky-700">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
            <div class="mt-3">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </form>
    </x-auth-card> --}}
</x-guest-layout>
