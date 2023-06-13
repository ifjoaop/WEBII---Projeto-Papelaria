
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        .hide {
            display: none;
        }
        body {
            background-color: lightyellow;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  
            <div class="container">
                <div class="container text-center">
                    <div class="d-flex justify-content-center">
                        <div class="mx-2">
                            <a href="{{ route('papelaria.index') }}" class="btn btn-primary d-block mb-2">Home</a>
                        </div>
                        <div class="mx-2">
                            <a href="{{ route('papelaria.login') }}" class="btn btn-primary d-block mb-2">Área Administrativa</a>
                        </div>

                        <div class="mx-2">
                            <a href="{{ route('papelaria.sobre') }}" class="btn btn-primary d-block mb-2">Sobre</a>
                        </div>

                        <div class="mx-2">
                            <a href="{{ route('papelaria.contato') }}" class="btn btn-primary d-block mb-2">Contato</a>
                        </div>

                        @guest
                            @if (Route::has('login'))
                                <a class="btn btn-primary d-block mb-2 d-none" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="btn btn-primary d-block mb-2 d-none" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>