{{-- <x-login-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-login-layout> --}}
<x-login-layout>
  @section('title', 'Register - Feliciano Admin')

    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-utensils me-2"></i>Feliciano</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="jhondoe">
                            <label for="name">Name</label>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control"name="password" id="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control"name="password_confirmation" id="password_confirmation" placeholder="Password">
                            <label for="password_confirmation">Confirm Password</label>
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                    </form>
                    <p class="text-center mb-0">Already have an Account? <a href="{{route('login')}}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</x-login-layout>