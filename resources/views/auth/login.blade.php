@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--breadcrumb area-->
<section class="breadcrumb-area gradient-overlay" style="background: url('{{asset('images/banner/3.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="site-breadcrumb">
                    <h2>Login Account</h2>
                </div>
            </div>
        </div>
    </div>
</section><!--/breadcrumb area-->

<!--Login Section -->
<section class="section-padding blue-bg shaded-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 centered">
                <div class="section-title cl-white">
                    <h4><span>New</span>Login account</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="site-form mb-30">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <input type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <button type="submit" class="bttn-mid btn-fill w-100">Login Account</button>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="extra-links">
                                    <a href="{{route('register')}}" class="cl-white">Create new account</a>
                                    <a href="forget-password.html" class="cl-white">Forget Password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--/Login Section-->
@endsection
