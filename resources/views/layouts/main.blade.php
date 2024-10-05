<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() == 'ar' ? 'الجوده' : 'Aljodh' }}</title>
    <!-- bootstarp -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/597cb1f685.js" crossorigin="anonymous"></script>

    <link href="{{ asset('build/assets/app-1698185b.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet">

    {{-- <link href="{!! asset('theme/css/sb-admin-2.css') !!}" rel="stylesheet"> --}}

    <style>
        ul.list-group {
            padding: 0
        }

        #address-list {

            top: 45px;
            /* margin-bottom: 0px; */
            cursor: pointer;
        }
    </style>
    @yield('cssStyle')

</head>

<body dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    style="text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <a href="" class="navbar-brand ">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="logo" width="70">
                {{-- <a class="text-primary font-weight-bold mr-2 mt-3" href="#"><h6>الجوده</h6></a> --}}
                {{-- <x-application-mark class="block h-9 w-auto" /> --}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item  {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home"></i>
                            {{ __('Home') }}
                        </a>
                    </li>



                    {{-- <li class="nav-item {{ request()->is('channel*') ? 'active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="fas fa-user-astronaut"></i>
                            {{ __('Complaints') }}
                        </a>
                    </li> --}}
                </ul>


                {{-- search --}}

                <form action="{{ route('submit.search') }}" method="post"
                    class="form-inline mx-auto position-relative">
                    @csrf
                    <input id="address" name="search" type="text" autocomplete="off" class="form-control mx-sm-2"
                        placeholder="{{ __('Search') }}" required>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">{{ __('Search') }}</button>

                    <div id="address-list" class="position-absolute w-75 bg-white border rounded shadow-sm left-4"
                        style="display: none;">
                        <ul class="list-group">
                        </ul>
                    </div>
                </form>



                {{-- select language --}}
                <div class="dropdown mx-auto">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ app()->getLocale() == 'ar' ? 'عربي' : 'English' }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        {{-- {{ route('lang', 'ar') }} --}}
                        <a class="dropdown-item" href="{{ route('lang', 'ar') }}">عربي</a>
                        {{-- {{ route('lang', 'en') }} --}}
                        <a class="dropdown-item" href="{{ route('lang', 'en') }}">English</a>
                    </div>
                </div>

                {{-- Authentication Links --}}
                <ul class="navbar-nav rtl:mr-auto ">
                    @guest
                        <li class="nav-item mt-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        {{-- @if (Route::has('register'))
                            <li class="nav-item mt-2">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown justify-content-left mt-2">
                            <a id="navbarDropdown" class="nav-link" href="#" data-toggle="dropdown">
                                <img class="h-8 w-8 rounded-circle" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-left px-2 text-right mt-2">
                                @can('update-videos')
                                    <a href="{{ route('admin.index') }}" class="dropdown-item text-right">لوحة الإدارة</a>
                                @endcan
                                <div class="pt-4 pb-1 border-t border-gray-200">
                                    <div class="mt-3 space-y-1">
                                        <!-- Account Management -->
                                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                                            class="dropdown-item ">
                                            {{ __('Profile') }}
                                        </x-responsive-nav-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')"
                                                class="dropdown-item ">
                                                {{ __('API Tokens') }}
                                            </x-responsive-nav-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-responsive-nav-link href="{{ route('logout') }}" class="dropdown-item"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Logout') }}
                                            </x-responsive-nav-link>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <div class="container">

            @if (Session::has('success'))
                <div class="p-3 mb-2 bg-success text-white rounded mx-auto col-8">
                    <span class="text-center">{{ session('success') }}</span>
                </div>
            @endif


            @yield('content')
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    @yield('script')
    <script>
        $(function() {
            $('#address').on('keyup', function() {
                var search = $(this).val();
                $('#address-list').fadeIn();

                $.ajax({
                    url: "{{ route('search') }}",
                    type: 'GET',
                    data: {
                        'search': search
                    }
                }).done(function(data) {
                    $('#address-list ul').html(data);
                    if ($('#address-list ul').children().length === 0) {
                        $('#address-list').hide();
                    }
                });
            });

            $('#address-list').on('click', 'li', function() {
                $('#address').val($(this).text());
                $('#address-list').fadeOut();
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#address-list').length) {
                    $('#address-list').fadeOut();
                }
            });
        });
    </script>

    {{-- <script>
        $(function() {
            $('#address').on('keyup', function() {
                var address = $(this).val();
                $('#address-list').fadeIn();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: 'GET',
                    data: {
                        'search': address
                    }
                }).done(function(date) {
                    $('#address-list').html(date);
                });
            });
            $('#address-list').on('click', 'li', function() {
                $('#address').val($(this).text());
                $('#address-list').fadeOut();
            });
        });
    </script> --}}
</body>

</html>
