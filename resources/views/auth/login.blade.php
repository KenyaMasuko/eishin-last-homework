{{-- @extends('layouts.app')

@section('content') --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>

<div class="flex justify-center items-center h-screen bg-gray-200 px-6">
    <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
        <div class="flex justify-center items-center">
            <svg class="h-10 w-10" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                    fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                    fill="white" />
            </svg>
            <span class="text-gray-700 font-semibold text-2xl">Dashboard</span>
        </div>

        <form class="mt-4" action="{{ route('user.login') }}" method="POST">
            user
            @csrf
            <label class="block">
                <span class="text-gray-700 text-sm">Email</span>
                <input id="email" type="email" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600
                @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>

            <label class=" block mt-3">
                <span class="text-gray-700 text-sm">Password</span>
                <input id="password" type="password"
                    class="form-input mt-1 block w-full rounded-md focus:border-indigo-600k @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>

            <div class="flex justify-between items-center mt-4">
                <div>
                    <label class="inline-flex items-center">
                        <input class="form-checkbox text-indigo-600" type="checkbox" name="remember" id="remember" {{
                            old('remember') ? 'checked' : '' }}>
                        <span class="mx-2 text-gray-600 text-sm">Remember me</span>
                    </label>
                </div>

                <div>
                    @if (Route::has('password.request'))
                    <a class="block text-sm fontme text-indigo-700 hover:underline"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <button
                    class="py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
{{-- @endsection --}}

</body>

</html>
