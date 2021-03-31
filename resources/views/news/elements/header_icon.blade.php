@php
    $total = '';
    if (!empty(session('cart'))) {
        $cart = session('cart');

        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value['quantity'];
        }
    }
    
@endphp

<div class="header-search same-style">
    <button class="search-toggle">
        <i class="icon-magnifier s-open"></i>
        <i class="ti-close s-close"></i>
    </button>
    <div class="search-content">
        <form action="#">
            <input type="text" placeholder="Search">
            <button>
                <i class="icon-magnifier"></i>
            </button>
        </form>
    </div>
</div>
<div class="header-login same-style">
    <a href="login-register.html"><i class="icon-user icons"></i></a>
</div>
<div class="header-cart same-style">
    <button class="icon-cart">
        <i class="icon-handbag"></i>
        <span class="count-style">{{ $total }}</span>
    </button>
    <div class="shopping-cart-content">
        <ul>
            <li class="single-shopping-cart">
                <div class="shopping-cart-img">
                    <a href="#"><img alt="" src="{{ asset('news/images/cart/cart-1.jpg') }}"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="#">Dog Calcium Food </a></h4>
                    <h6>Qty: 02</h6>
                    <span>$260.00</span>
                </div>
                <div class="shopping-cart-delete">
                    <a href="#"><i class="ti-close"></i></a>
                </div>
            </li>
            <li class="single-shopping-cart">
                <div class="shopping-cart-img">
                    <a href="#"><img alt="" src="{{ asset('news/images/cart/cart-2.jpg') }}"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="#">Dog Calcium Food</a></h4>
                    <h6>Qty: 02</h6>
                    <span>$260.00</span>
                </div>
                <div class="shopping-cart-delete">
                    <a href="#"><i class="ti-close"></i></a>
                </div>
            </li>
        </ul>
        <div class="shopping-cart-total">
            <h4>Shipping : <span>$20.00</span></h4>
            <h4>Total : <span class="shop-total">$260.00</span></h4>
        </div>
        <div class="shopping-cart-btn">
            <a href="cart.html">view cart</a>
            <a href="checkout.html">checkout</a>
        </div>
    </div>
</div>
