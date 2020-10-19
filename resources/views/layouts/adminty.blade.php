<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adminty - Gestion Des Activités</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">


    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/sweetalert/css/sweetalert.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/feather/css/feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
</head>

<body>

    @yield('css')

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header iscollapsed" header-theme="theme2" pcoded-header-position="fixed">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index-1.htm">
                            <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

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
                                <li class="user-profile header-notification">
                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </span>
                                    <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="">
                                                <i class="feather icon-user"></i> {{ ('Mon profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i>
                                            {{ __('Deconnexion') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        </li>
                                    </ul>
                                    </div>
                                </li>
                            @endguest

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" navbar-theme="themelight1" active-item-theme="theme1" sub-item-theme="theme2" active-item-style="style0" pcoded-navbar-position="fixed">
                        <div class="pcoded-inner-navbar main-menu mCustomScrollbar _mCS_1" id="" style="height: calc(100% - 80px);">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index-1.htm"">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Gestion des activités</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Opérations</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ route('activites.index') }}">
                                                <span class="pcoded-mtext">Activités</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('interfacedecaissement') }}">
                                                <span class="pcoded-mtext">Décaissements</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('interfacejustification') }}">
                                                <span class="pcoded-mtext">Justifications</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Modification budget</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            {{-- <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{ route('budgets.index') }}">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Les budgets</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul> --}}
                            <div class="pcoded-navigatio-lavel">Gestion des utilisateurs</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                        <span class="pcoded-mtext">Utilisateurs</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ route('users.index') }}">
                                                <span class="pcoded-mtext">Utilisateurs</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('roles.index') }}" target="_blank">
                                                <span class="pcoded-mtext">Rôles</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Paramétrages</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                        <span class="pcoded-mtext">Paramétres</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ route('demandeurs.index') }}">
                                                <span class="pcoded-mtext">Demandeurs</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('ligne_activites.index') }}" target="_blank">
                                                <span class="pcoded-mtext">Lignes activités</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('bailleurs.index') }}" target="_blank">
                                                <span class="pcoded-mtext">Projets</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('responsable_activites.index') }}" target="_blank">
                                                <span class="pcoded-mtext">Responsables activités</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    @yield('content')

                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/popper.js/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/js/modernizr.js') }}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('bower_components/chart.js/js/Chart.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset('assets/pages/widget/amchart/amcharts.js') }}"></script>
    <script src="{{ asset('assets/pages/widget/amchart/serial.js') }}"></script>
    <script src="{{ asset('assets/pages/widget/amchart/light.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ asset('bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
    @include('flash-message')
    <!-- custom js -->
    <script src="{{ asset('assets/js/vartical-layout.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.min.js') }}"></script>


    <script src="{{ asset('axios/axios.min.js') }}"></script>
    <script>
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    </script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

    @yield('js')

</body>

</html>
