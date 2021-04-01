@php
    use App\Helpers\Template;
    use App\Helpers\URL;
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

{{-- @foreach($items as $key => $value)
    @php
        $id                = $value['id'];
        $linkModal         = URL::linkModal($id);
        $linkProduct       = URL::linkProduct($value, 'index');
        $thumb             = $value['thumb'];
        $name              = $value['name'];
        $quantity          = $value['quantity'];
        $htmlPrice         = Template::caculatorPriceFrontend($value['price'], $value['price_sale'], $value['sale']);
        $short_description = $value['short_description'];
    @endphp

    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
        <div class="product-wrapper mb-10">

            @include('news.partials.product.product_image', ['linkProduct' => $linkProduct])
            @include('news.partials.product.product_content')
            @include('news.partials.product.product_list_content', ['quantity' => $quantity, 'quickview' => true])

        </div>
    </div>

@endforeach --}}

{{-- <img src="{{ asset('news/images/banner/banner-2.png') }}" alt=""> --}}
<tr>
    <td class="product-thumbnail">
        <a href="#"><img src="{{ asset('news/images/cart/cart-3.jpg') }}" alt=""></a>
    </td>
    <td class="product-name"><a href="#">Dry Dog Food</a></td>
    <td class="product-price-cart"><span class="amount">$110.00</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
        </div>
    </td>
    <td class="product-subtotal">$110.00</td>
    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
</tr>
<tr>
    <td class="product-thumbnail">
        <a href="#"><img src="{{ asset('news/images/cart/cart-4.jpg') }}" alt=""></a>
    </td>
    <td class="product-name"><a href="#">Cat Buffalo Food</a></td>
    <td class="product-price-cart"><span class="amount">$150.00</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
        </div>
    </td>
    <td class="product-subtotal">$150.00</td>
    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
</tr>
<tr>
    <td class="product-thumbnail">
        <a href="#"><img src="{{ asset('news/images/cart/cart-5.jpg') }}" alt=""></a>
    </td>
    <td class="product-name"><a href="#">Legacy Dog Food</a></td>
    <td class="product-price-cart"><span class="amount">$170.00</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
        </div>
    </td>
    <td class="product-subtotal">$170.00</td>
    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
</tr>


