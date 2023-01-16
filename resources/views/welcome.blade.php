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
                        <h1><i>Number one online payment platform</i></h1>
                        <div class="hero-btn">
                            <a href="/Dashboard" class="bttn-mid btn-fill mr-10">Get Started</a>
                            <a href="#howitworks" class="bttn-mid btn-blu">How it works?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/Hero Area-->
<!--Payment Category-->
<section class="section-padding-2 blue-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="section-title">
                    <h4><span>New</span>Payment Category</h4>
                    <h2>Payment Category</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-sm-4">
                <div class="single-cat-cas">
                    <img src="{{asset('images/icons/1.png')}}" alt="">
                    <h5><a href="#">Send money</a></h5>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-sm-4">
                <div class="single-cat-cas">
                    <img src="{{asset('images/icons/2.png')}}" alt="">
                    <h5><a href="#">Payment online</a></h5>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-sm-4">
                <div class="single-cat-cas">
                    <img src="{{asset('images/icons/3.png')}}" alt="">
                    <h5><a href="#">Receive Money</a></h5>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-sm-4">
                <div class="single-cat-cas">
                    <img src="{{asset('images/icons/4.png')}}" alt="">
                    <h5><a href="#">Widthdraw</a></h5>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-sm-4">
                <div class="single-cat-cas">
                    <img src="{{asset('images/icons/5.png')}}" alt="">
                    <h5><a href="#">Cash board</a></h5>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-sm-4">
                <div class="single-cat-cas">
                    <img src="{{asset('images/icons/6.png')}}" alt="">
                    <h5><a href="#">Deposit</a></h5>
                </div>
            </div>
        </div>
    </div>
</section><!--/Payment Category-->
<!--How It works-->
<section class="steps-area section-padding-2 blue-bg" id="howitworks">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 centered">
                <div class="section-title cl-white">
                    <h4><span>Start</span>How It works?</h4>
                    <h2>How It works</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-steps">
                    <div class="step-number">1</div>
                    <i class="flaticon-007-user"></i>
                    <h4>Signin account</h4>
                    <p>Sign up with 1000 Naira and receive a bonus of 200 Naira if you were not refered or a bonus of 100 Naira if you were refered</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-steps">
                    <div class="step-number">2</div>
                    <i class="flaticon-009-percentage"></i>
                    <h4>Get bonus</h4>
                    <p>Get a whopping sum of 400 Naira when you refer a friend</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-steps">
                    <div class="step-number">3</div>
                    <i class="flaticon-034-bank"></i>
                    <h4>Start Transaction</h4>
                    <p>You can transfer you money to friends and family</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-steps">
                    <div class="step-number">4</div>
                    <i class="flaticon-038-agreement"></i>
                    <h4>Happy Earnings</h4>
                    <p>You can withdraw anytime and get you money within minutes</p>
                </div>
            </div>
        </div>
    </div>
</section><!--/How It works-->


@endsection
