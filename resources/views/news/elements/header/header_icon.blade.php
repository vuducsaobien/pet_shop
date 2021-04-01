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
            @include('news.elements.header.header_ajax')
        </ul>

        <div class="shopping-cart-total">
            <h4>Shipping : <span>$20.00</span></h4>
            <h4>Total : <span class="shop-total">$260.00</span></h4>
        </div>
        <div class="shopping-cart-btn">
            <a href="{{ route('cart') }}">view cart</a>
            <a href="{{ route('checkout') }}">checkout</a>
        </div>

    </div>

</div>
