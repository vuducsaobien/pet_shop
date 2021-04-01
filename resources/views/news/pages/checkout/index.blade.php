@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Checkout'])

    <div class="checkout-area pt-95 pb-70">
        <div class="container">
            <h3 class="page-title">checkout</h3>
            <div class="row">
                <div class="col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">

                            <!-- Checkout Method -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Checkout method</a></h5>
                                </div>
                                <div id="payment-1" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="row">
                                            @include('news.pages.checkout.child-index.checkout')
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Billing -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">billing information</a></h5>
                                </div>
                                <div id="payment-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            @include('news.pages.checkout.child-index.billing')
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Ship Info -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-3">shipping information</a></h5>
                                </div>
                                <div id="payment-3" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <div class="shipping-information-wrapper">
                                            @include('news.pages.checkout.child-index.ship_info')
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Ship Method -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>4</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-4">Shipping method</a></h5>
                                </div>
                                <div id="payment-4" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <div class="shipping-method-wrapper">
                                            @include('news.pages.checkout.child-index.ship_method')
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Payment -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>5</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-5">payment information</a></h5>
                                </div>
                                <div id="payment-5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="payment-info-wrapper">
                                            @include('news.pages.checkout.child-index.payment')
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Order -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>6</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Order Review</a></h5>
                                </div>
                                <div id="payment-6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="order-review-wrapper">
                                            <div class="order-review">
                                                @include('news.pages.checkout.child-index.order')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>

                
                <!-- PROGRESS -->
                @include('news.pages.checkout.child-index.progress')

            </div>
        </div>
    </div>

@endsection
        
