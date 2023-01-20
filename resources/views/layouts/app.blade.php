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

<body>

    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @if(!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check()))
        @if (Route::has('login'))
        <li class="nav-item">
            @isset($authgroup)
            <a class="nav-link" href="{{ url("login/$authgroup") }}">{{ __('ログインする') }}</a>
            @else
            <a class="nav-link" href="{{ route('login') }}">{{ __('ログインする') }}</a>
            @endisset
        </li>
        @endif

        @if (Route::has('register'))
        @isset($authgroup)
        {{-- admin regiseter --}}
        @if (Route::has("$authgroup-register"))
        <li class="nav-item">
            <a class="nav-link" href="{{ route($authgroup . '-register') }}">{{ __('登録する') }}</a>
        </li>
        @endif
        @else
        {{-- user register --}}
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('登録する') }}</a>
        </li>
        @endif
        @endisset
        @endif
        @else
        {{-- ログインしている時 --}}
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>

                @isset($authgroup)
                {{ $authgroup }}ユーザー名 : {{ Auth::guard($authgroup)->user()->name }}
                @else
                一般ユーザー名 : {{ Auth::user()->name }}
                @endisset
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('ログアウトする') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </a>
        </li>
        @endif
    </ul>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <script type="text/javascript">
        function dropdown() {
document.querySelector("#submenu").classList.toggle("hidden");
document.querySelector("#arrow").classList.toggle("rotate-0");
}
dropdown();

function openSidebar() {
document.querySelector(".sidebar").classList.toggle("hidden");
}
    </script>
</body>

</html>
