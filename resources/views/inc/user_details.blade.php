<section class="section-padding-sm-2 blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                <div class="card">
                    <div class="card-header">
                        {{-- <img src="assets/images/new-user/1.jpg" alt=""> --}} Profile <a href="{{route('profile')}}"><i class="ti-arrow-top-right"></i></a>
                    </div>
                    <div class="card-body">
                        <p>Good Morning! <strong>{{$user->first_name. ' '. $user->last_name }}</strong></p>
                        <p>Account Number: <strong>{{$user->acct_number}}</strong>
                        <button class="btn btn-sm btn-primary" onclick="CopyAccount()">Copy</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                <div class="card">
                    <div class="card-header">
                        Balance
                    </div>
                    <div class="card-body">
                        <p>NG Naira : <strong>₦{{number_format($user->balance)}}</strong></p>
                        <p>US Dollar : <strong>${{number_format(floor($user->balance/730))}}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                <div class="card">
                    <div class="card-header">
                        Bank account
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="ti-check cl-primary"></i> First Bank Nigeria</li>
                        <li class="list-group-item"><a href="#"><i class="ti-plus"></i> Add new Account</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-20">
                <div class="alert alert-info" role="alert">
                    <strong>Info!</strong> You can transfer money to your friends and family using their account number.
                </div>
            </div>
        </div>
        @if(!$user->is_active)
        <div class="row">
            <!-- alert for information -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-20">
                <div class="alert alert-info" role="alert">
                    <strong>Info!</strong> Your account has not been activated, please click <a href="/activate/account">here</a> or click on Activate Account to pay the registration fee.</strong>
                </div>
            </div>
        </div>
        @endif
    </div>
</section><!--Dashboard top-->
