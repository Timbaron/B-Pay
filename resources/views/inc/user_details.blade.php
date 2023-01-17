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
                       Withdraw
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="ti-check cl-primary"></i> Click Below to withdraw</li>
                        <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#withdraw"><i class="ti-plus"></i> Withdraw</a></li>
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


<div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="row no-gutters">
                <div class="col-sm-5 d-flex justify-content-center blue-bg-2 py-4">
                    <div class="transaction-modal-left my-auto centered">
                        <div class="mb-30"><i class="flaticon-006-wallet"></i></div>
                        <h3 class="my-3">Your Balance</h3>
                        <h4 class="cl-white my-4">₦{{number_format($user->balance)}}</h4>
                        <p class="cl-white"></p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Withdraw money to bank account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="transaction-modal-details">
                        <div class="faq-contents">
                            <!-- transfer form -->
                            <form action="{{route('withdraw')}}" method="post">
                                @csrf
                                <label for="to-account">Enter Account Number:</label>
                                <div class="input-group">
                                    <input type="number" min="10" class="form-control" onChange="HideAccount()" placeholder="Search..." id="acct_number" name="acct_number">
                                </div>
                                <br>
                                <label for="from-account">Select Bank:</label>
                                <select class="form-control" name="bank">
                                    <option value="" selected>Select Bank....</option>
                                    @foreach($banks as $bank)
                                    <option value="{{$bank->code}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="amount">Amount: </label><small style="color:red"> (You'll be charge 5% of withdrawal amount)</small>
                                <input type="number" min="2000" max="{{$user->balance}}" class="form-control" placeholder="Enter Amount to withdraw minimum of 2000" id="amount" name="amount" required>
                                <br>
                                <label for="amount">Enter Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Your Password" id="password" name="password" required>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-primary">Withdraw</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /Transaction Details Modal -->
</div>
