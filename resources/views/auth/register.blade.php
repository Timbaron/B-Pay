@extends('layouts.app')

@section('content')
<!--breadcrumb area-->
<section class="breadcrumb-area gradient-overlay" style="background: url('assets/images/banner/3.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="site-breadcrumb">
                    <h2>Register now</h2>
                </div>
            </div>
        </div>
    </div>
</section><!--/breadcrumb area-->

<!--Signup Section -->
<section class="section-padding blue-bg shaded-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 centered">
                <div class="section-title cl-white">
                    <h4><span>New</span>Create account</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <div class="site-form mb-30">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                @error('first_name')
                                    <span style="color: red"><i>Invalid First Name</i></span>
                                @enderror
                                <input type="text" placeholder="First Name" name="first_name" value="{{old('first_name')}}" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                @error('last_name')
                                    <span style="color: red"><i>Invalid Last Name</i></span>
                                @enderror
                                <input type="text" placeholder="Last Name" name="last_name" value="{{old('last_name')}}" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                @error('email')
                                    <span style="color: red"><i>Invalid Email Adress</i></span>
                                @enderror
                                <input type="email" placeholder="Email" name="email" value="{{old('email')}}" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                @error('phone')
                                    <span style="color: red"><i>Invalid phone Number</i></span>
                                @enderror
                                <input type="text" placeholder="Phone" name="phone_number" value="{{old('phone')}}" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                @error('password')
                                    <span style="color: red"><i>Password do not match</i></span>
                                @enderror
                                <input type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <input type="password" placeholder="Re-Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <button type="submit" class="bttn-mid btn-fill w-100">Register now</button>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="extra-links">
                                    <a href="login.html" class="cl-white">Login Account?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--/Signup Section-->

@endsection
