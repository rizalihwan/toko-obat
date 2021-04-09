<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- datatables css cdn --}}
    @stack('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @auth
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <em style="color: blue;">Dashboard</em>
                    </a>
                    @if(auth()->user()->role == 'admin')
                        <a class="navbar-brand" href="{{ route('drug.index') }}">
                            <em style="color: blue;">DaftarObat</em>
                        </a>
                        <a class="navbar-brand" href="{{ route('supply.index') }}">
                            <em style="color: blue;">DaftarPemasok</em>
                        </a>
                    @else 
                        <a class="navbar-brand" href="{{ route('customer.buy') }}">
                            <em style="color: blue;">BeliObat</em>
                        </a>
                    @endif
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <em style="color: blue;">Welcome</em>
                    </a>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="#" onclick="logout()" class="dropdown-item"> {{ __('Logout') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                <script>
                                    function logout()
                                    {
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Apa anda yakin ingin keluar dari aplikasi?',
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonText: 'Ya, Keluar!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    Swal.fire({
                                                        title: "Keluar...",
                                                        showConfirmButton: false,
                                                        timer: 2300,
                                                        timerProgressBar: true,
                                                        onOpen: () => {
                                                            document.getElementById('logout-form').submit();
                                                            Swal.showLoading();
                                                        }
                                                    });
                                                }
                                        })
                                    }
                                </script>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
