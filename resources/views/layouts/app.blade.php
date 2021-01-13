<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>B-Pay</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">


    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">


    <!-- Main css -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <main class="py-4">

            <!-- Preloader -->
            <!--Header Area-->
        <header class="header-area blue-bg-2">
            <nav class="navbar navbar-expand-lg main-menu">
                <div class="container-fluid">

                    <a class="navbar-brand" href="index-2.html"><img src="images/logo-2.png" class="d-inline-block align-top" alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="how-it-works.html">How it works</a></li>
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="about.html">About</a></li>
                                    <li><a class="dropdown-item" href="packages.html">All Packages</a></li>
                                    <li><a class="dropdown-item" href="faq.html">FAQ page</a></li>
                                    <li><a class="dropdown-item" href="testimonials.html">Success Stories</a></li>
                                    <li><a class="dropdown-item" href="affiliate.html">Affiliate</a></li>
                                    <li><a class="dropdown-item" href="404.html">Error page</a></li>
                                    <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                                    <li><a class="dropdown-item" href="tos.html">Terms and Services</a></li>
                                    <li><a class="dropdown-item" href="login.html">Login</a></li>
                                    <li><a class="dropdown-item" href="register.html">Registration</a></li>
                                    <li><a class="dropdown-item" href="forget-password.html">Forget Password</a></li>
                                </ul>
                            </li> --}}
                            @auth

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="transactions.html">Transactions</a></li>
                                    <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                    {{-- <li><a class="dropdown-item" href="notification.html">Notifications</a></li>
                                    <li><a class="dropdown-item" href="send-money.html">Send Money</a></li>
                                    <li><a class="dropdown-item" href="send-money-success.html">Send Money Success</a></li>
                                    <li><a class="dropdown-item" href="deposit-money.html">Deposit Money</a></li>
                                    <li><a class="dropdown-item" href="deposit-money-success.html">Deposit Money Success</a></li>
                                    <li><a class="dropdown-item" href="withdraw-money.html">Withdraw Money</a></li>
                                    <li><a class="dropdown-item" href="withdraw-money-success.html">Withdraw Money Success</a></li>
                                    <li><a class="dropdown-item" href="add-card.html">Add Credit Card</a></li>
                                    <li><a class="dropdown-item" href="fees.html">Transaction fees</a></li> --}}
                                </ul>
                            </li>
                            @endauth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog.html">All News</a></li>
                                    <li><a class="dropdown-item" href="blog-details.html">Single News</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                        @auth
                            <div class="header-btn justify-content-end">
                                {{-- <a href="login.html" class="">Logout</a> --}}
                                <a class="bttn-small btn-fill" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="header-btn justify-content-end">
                                <a href="{{route('login')}}" class="bttn-small btn-fill">Account Login</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </header><!--/Header Area-->

            <!--/Preloader -->
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>

    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>

    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/scrollUp.min.js')}}"></script>

    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
