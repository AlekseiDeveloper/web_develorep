<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test-task</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fm.selectator.jquery.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css')}}">
</head>
<style>
    .navbar-light.navbar-laravel.navbar.navbar-expand-md .navbar-brand {
        color: white;
    }
    .navbar-light .navbar-nav .nav-link{
        color: white;
    }
    .navbar-light .navbar-nav .nav-link:hover{
        color: white;
    }
    .navbar-light .navbar-nav .nav-link:focus{
        color: white;
    }
    .wrap-menu-outside .main-menu-top ul li a{
        color: grey;
    }
    .linkWthite{
        color: white;
    }
    .linkWthite:hover{
        color: white;
    }
    .linkWthite:focus{
        color: white;
    }
    .none-style #selectator_select7 input{
        border: none;
        border-radius: none;
        margin: 5px;
        outline: none;
    }
</style>
<body>

<header>
    <div class="wrap-menu-outside" style="background: #359fe6 !important;">
        <div class="container">
            <div class="main-menu-top">
                <div class="row">
                    <div class="col-xl-18">
                        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                            <div class="container">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                                <a class="linkWthite" href="{{ route('admin.articles.index') }}">
                                    В таблицу новостей
                                </a>
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
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="content">
    @if(session()->exists('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @yield('content')
</section>


<script src=" {{asset('js/jquery.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.datetimepicker.js')}}"></script>
<script src="{{asset('js/fm.selectator.jquery.js')}}"></script>
<script src="{{asset('js/fm.selectator.jquery.min.css')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script>

    jQuery(document).ready(function () {
        'use strict';

        jQuery('#filter-date').datetimepicker();
    });
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

@yield('script')
</body>
</html>