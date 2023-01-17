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
    @notifyCss

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-roller"></div>
    </div><!--/Preloader -->
    <!--Header Area-->
    <header class="header-area blue-bg-2">
        <nav class="navbar navbar-expand-lg main-menu">
            <div class="container-fluid">

                <a class="navbar-brand" href="/"><img src="images/logo-2.png" class="d-inline-block align-top" alt=""></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#howitworks">How it works</a></li>
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
                                <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li><a class="dropdown-item" href="transactions.html">Transactions</a></li>
                                    <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                    <li><a class="dropdown-item" href="notification.html">Notifications</a></li>
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
                        <a class="bttn-small btn-fill" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        <x:notify-messages />
        @notifyJs
    </header><!--/Header Area-->
    @yield('content')
    <!--newslatter-->
    <section class="section-padding blue-bg-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="call-to-action centered">
                        <div class="section-title">
                            <h4><span>Top</span>Stay updated</h4>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <div class="newslatter">
                                    <form action="#">
                                        <input type="email" placeholder="Email Address" required>
                                        <button type="submit">Subscribe</button>
                                    </form>
                                    <div class="social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/newslatter-->
    <!--Footer Area-->
    <footer class="footer-area section-padding-2 blue-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12">
                    <div class="footer-logo">
                        <a href="#"><img src="{{asset('images/logo-2.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-12">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Trams and Service</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-xl-6 col-sm-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2020. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6">
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!--/Footer Area-->

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
