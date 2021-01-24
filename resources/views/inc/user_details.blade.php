<section class="section-padding-sm-2 blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                <div class="card">
                    <div class="card-header">
                        <img src="assets/images/new-user/1.jpg" alt=""> Profile <a href="{{route('profile')}}"><i class="ti-arrow-top-right"></i></a>
                    </div>
                    <div class="card-body">
                        <p>Good Morning! <strong>{{$user->first_name. ' '. $user->last_name }}</strong></p>
                        <p>Account Number: <strong>{{$user->acct_number}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                <div class="card">
                    <div class="card-header">
                        Balance
                    </div>
                    <div class="card-body">
                        <p>NG Naira : <strong>${{$user->balance}}</strong></p>
                        <p>US Dollar : <strong>${{$user->balance/380}}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                <div class="card">
                    <div class="card-header">
                        Bank account
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="ti-check cl-primary"></i> Padlock Holdings Bank Corp.</li>
                        <li class="list-group-item"><a href="#"><i class="ti-plus"></i> Add new Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--Dashboard top-->
