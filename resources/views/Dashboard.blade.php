@extends('layouts.app')
@section('content')
@include('inc.user_details')
  <!--Dashboard Bottom-->
  <section class="section-padding-sm-2 blue-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            @include('inc.sidebar')
            <div class="col-xl-9 col-lg-9 col-md-12 mb-20">
                <div class="transaction-list table-responsive">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Card</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr data-toggle="modal" data-target="#exampleModalCenter">
                              <td><span>{{$transaction->created_at}}</span></td>
                              <td><strong>{{$transaction->description}}</strong></td>
                              <td><strong> ${{$transaction->amount}}</strong></td>
                              <td><i class="ti-check cl-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Finished"></i></td>
                              <td><strong class="cl-primary">Card</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="centered mt-30">
                        <a href="transactions.html" class="bttn-mid btn-fill">All Transactions</a>
                    </div>
                    <!-- Transaction Details Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="row no-gutters">
                                    <div class="col-sm-5 d-flex justify-content-center blue-bg-2 py-4">
                                        <div class="transaction-modal-left my-auto centered">
                                            <div class="mb-30"><i class="flaticon-006-wallet"></i></div>
                                            <h3 class="my-3">Padlock Holdings Bank Corp</h3>
                                            <h4 class="cl-white my-4">$598.20</h4>
                                            <p class="cl-white">10 Feb 2020</p>
                                            <div class="completed">Completed</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Transaction Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="transaction-modal-details">
                                            <div class="faq-contents">
                                                <ul class="accordion">
                                                    <li>
                                                        <a href="#">Transaction details</a>
                                                        <p>
                                                            <strong>Transaction ID</strong> <br><span>35791598</span><br><br>
                                                            <strong>To</strong> <br><span>Namecheap Ltd.</span><br><br>
                                                            <strong>Description</strong> <br><span>Domain Purchasing cost felis id rhoncus eros dui</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <a href="#">Transfer details</a>
                                                        <p>
                                                            <strong>Transfer ID</strong> <br><span>587935791598</span><br><br>
                                                            <strong>Transfer amount</strong> <br><span>5,326.36 USD</span><br><br>
                                                            <strong>Exchange rate</strong> <br><span>1 USD = 0.92 GBP</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <a href="#">Transaction history</a>
                                                        <p>
                                                            <strong>Completed</strong> <br><span>15 Feb 2020</span><br><br>
                                                            <strong>Approved</strong> <br><span>15 Feb 2020</span><br><br>
                                                            <strong>Under review</strong> <br><span>15 Feb 2020</span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /Transaction Details Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--Dashboard Bottom-->
@endsection
