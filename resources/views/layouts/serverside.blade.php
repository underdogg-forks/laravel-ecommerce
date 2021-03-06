<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="currency" content="{{ env('ECOMMERCE_CURRENCY') }}">
    <meta name="currency-sign" content="{{ env('ECOMMERCE_CURRENCY_SIGN') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'currency' => env('ECOMMERCE_CURRENCY'),
            'currencySign' => env('ECOMMERCE_CURRENCY_SIGN'),
        ]) !!};
    </script>
</head>
<body>
<div>

    @if (auth()->check())
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">{{ __('orders.orders') }}
                                    <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">{{ __('default.create new') }}</a></li>
                                    <li><a href="#">{{ __('default.show all') }}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">{{ __('products.products') }}
                                    <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.products.create') }}">{{ __('default.create new') }}</a>
                                    </li>
                                    <li><a href="{{ route('admin.products.index') }}">{{ __('default.show all') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">{{ __('categories.categories') }}
                                    <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.categories.create') }}">{{ __('default.create new') }}</a>
                                    </li>
                                    <li><a href="{{ route('admin.categories.index') }}">{{ __('default.show all') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ __('coupons.coupons') }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">{{ __('default.create new') }}</a></li>
                                    <li><a href="#">{{ __('default.show all') }}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ __('users.users') }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('admin.users.create') }}">{{ __('default.create new') }}</a>
                                    </li>
                                    <li><a href="{{ route('admin.users.index') }}">{{ __('default.show all') }}</a></li>
                                    <li><a href="#">{{ __('roles.roles') }}</a></li>
                                    <li><a href="#">{{ __('permissions.permissions') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#"></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('auth.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li>
                            <minicart></minicart>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
