@extends('layouts.app')
@section('content')
<!--Hero Area-->
<section class="hero-slider owl-carousel">
    <div class="single-slide gradient-overlay" style="background: url('{{asset('images/banner/2.jpg')}}') no-repeat center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 centered">
                    <div class="hero-content">
                        <h4>B-Pay is an insane</h4>
                        <h1>Number one online payment platform</h1>
                        <div class="hero-btn">
                            <a href="contact.html" class="bttn-mid btn-fill mr-10">Learn more</a>
                            <a href="how-it-works.html" class="bttn-mid btn-blu">How it works?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-slide gradient-overlay" style="background: url('assets/images/banner/4.jpg') no-repeat center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 centered">
                    <div class="hero-content">
                        <h4>#1 number online money transfering system</h4>
                        <h1>Make online payment for free from anywhere</h1>
                        <div class="hero-btn">
                            <a href="send-money.html" class="bttn-mid btn-fill mr-10">Pay now</a>
                            <a href="dashboard.html" class="bttn-mid btn-blu">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/Hero Area-->
@endsection
