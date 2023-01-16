<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-20">
    <div class="card mb-30">
        <div class="card-header">
            Someone to pay?
        </div>
        <div class="card-body">
            <p>You can Send money to a friend and money is received immediately.</p>
            <a href="#" data-toggle="modal" data-target="#makeTransferCenter" class="bttn-small btn-fill"><i class="ti-user"></i> Make a payment</a>
        </div>
    </div>
    <div class="card mb-30">
        <div class="card-header">
            Earn ₦400 to invite
        </div>
        <div class="card-body">
            <p>Copy the link below to invite a friend and earn a total of ₦400</p>
            <a href="#" onclick="CopyCode()" class="bttn-small btn-fill"><i class="ti-arrow-down"></i>Click to copy link</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Receive a payment?
        </div>
        <div class="card-body">
            <p>Click the button below to copy your account number. Send account number to a fellow B-Pay user</p>
            <a href="#" onclick="CopyAccount()" class="bttn-small btn-fill"><i class="ti-arrow-down"></i>Copy Acc Number</a>
        </div>
    </div>
</div>

<!-- Transaction Details Modal -->
<div class="modal fade" id="makeTransferCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Transfer Money to Friend?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="transaction-modal-details">
                        <div class="faq-contents">
                            <!-- transfer form -->
                            <form action="{{route('transfer.initiate')}}" method="post">
                                @csrf
                                <label for="from-account">From Account:</label>
                                <select class="form-control" id="from-account" name="from-account">
                                    <option value="" selected>Select Account....</option>
                                    <option value="main">Main Account ({{number_format($user->balance)}})</option>
                                </select>
                                <br>
                                <label for="to-account">Enter Account Number:</label>
                                <div class="input-group">
                                    <input type="number" min="10" class="form-control" onChange="HideAccount()" placeholder="Search..." id="acct_number" name="acct_number">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" onclick="findAccount()" type="button">Find Account</button>
                                    </div>
                                </div>
                                <br>
                                <!-- Display account name -->
                                <div class="alert alert-success" role="alert" id="account_details" style="display: none">
                                    Account Name: <strong id="account_name"></strong>
                                </div>
                                <br>
                                <label for="amount">Amount:</label>
                                <input type="number" min="100" max="{{$user->balance}}" class="form-control" placeholder="Enter Amount to transfer" id="amount" name="amount" required>
                                <br>
                                <label for="amount">Enter Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Your Password" id="password" name="password" required>
                                <br>
                                <div id="submitButton" style="display: none">
                                    <button type="submit" class="btn btn-primary">Complete Transfer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /Transaction Details Modal -->
</div>

<script>
    function CopyCode() {
        navigator.clipboard.writeText("{{config('app.url').'/register/'.$user->affiliate_id}}");

        alert('Referral Link Copied to clipboard');
    }

    function CopyAccount() {
        navigator.clipboard.writeText("{{$user->acct_number}}");

        alert('Account Number Copied to clipboard');
    }

    function findAccount(){
        var acct_number = $('#acct_number').val();
        if(acct_number.length == 10){
            $.ajax({
                url: "{{route('find.account')}}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "acct_number": acct_number
                },
                success: function (response) {
                    if(response.status == 'success'){
                        $('#account_details').show();
                        $('#submitButton').show();
                        $('#account_name').text(response.account_name);
                    }else{
                        $('#account_details').hide();
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }else{
            alert('Account number must be 10 digits');
        }
    }

    function HideAccount(){
        $('#account_details').hide();
        $('#submitButton').hide();
    }
</script>
