@extends('layouts.app')
@section('content')
@include('inc.user_details')
<section class="section-padding-sm-2 blue-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            @include('inc.sidebar')
            <div class="col-xl-9 col-lg-9 col-md-12 mb-20">
                <div class="card mb-30">
                    <div class="card-header">
                        Profile Info <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Profile info"><i class="ti-pencil"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="profile-card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb text-right">
                                        <img src="assets/images/new-user/1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-3">
                                    <div class="left-info text-right">
                                        <p>Name</p>
                                        <p>Date of Birth</p>
                                        <p>Address</p>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-9">
                                    <div class="right-info">
                                        <p>{{$user->first_name . ' ' . $user->last_name}}</p>
                                        <p>{{$user->date_of_birth ?? 'Null'}}</p>
                                        <p>{{$user->address ?? 'Null'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-30">
                    <div class="card-header">
                        Security <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Security info"><i class="ti-pencil"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="profile-card-body">
                            <div class="row">
                                <div class="col-sm-3 col-3">
                                    <div class="left-info text-right">
                                        <p>Password</p>
                                        <p>Mobile Number</p>
                                        <p>Transfer Password</p>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-9">
                                    <div class="right-info">
                                        <p>*************</p>
                                        <p>{{$user->phone_number ?? 'Null'}}</p>
                                        <p>
                                            @if ($user->transfer_password)
                                                On
                                            @else
                                                Off
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-30">
                    <div class="card-header">
                        Email Info<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Email info"><i class="ti-pencil"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="profile-card-body">
                            <div class="row">
                                <div class="col-sm-3 col-3">
                                    <div class="left-info text-right">
                                        <p>Primary Email</p>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-9">
                                    <div class="right-info">
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Account Closing
                    </div>
                    <div class="card-body">
                        <div class="profile-card-body">
                            <div class="row">
                                <div class="col-sm-3 col-3">
                                    <div class="left-info text-right">
                                        <p>Want to Close?</p>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-9">
                                    <div class="right-info">
                                        <a href="#"><i class="ti-close cl-red"></i> Close Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--Dashboard Bottom-->

@endsection
