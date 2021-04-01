@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Cart Page'])

    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <form action="#">
                        <div class="table-content table-responsive">
                            <!-- Table -->
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @include('news.pages.cart.child-index.table')
                                </tbody>
                            </table>
                        </div>

                        <!-- Buttons -->
                        @include('news.pages.cart.child-index.buttons')
                    </form>

                    <div class="row">
                        <!-- ship -->
                        @include('news.pages.cart.child-index.ship')

                        <!-- discount -->
                        @include('news.pages.cart.child-index.discount')

                        <!-- total -->
                        @include('news.pages.cart.child-index.total')
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
        
