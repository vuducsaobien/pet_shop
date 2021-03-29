@php
    use App\Helpers\Template;

    // echo '<pre style="color:red";>$item === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    $name              = $items['name'];
    $sku               = $items['product_code'];
    $short_description = $items['short_description'];
    $htmlPrice         = Template::caculatorPriceFrontend($items['price'], $items['price_sale'], $items['sale']);
    $htmlAtribute      = Template::getHtmlAttribute($items['attribute'], $items['list_attribute']);

@endphp

<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row">

            @include('news.pages.product.child-index.product_image')

            <div class="col-lg-6 col-md-6">
                <div class="product-details-content">

                    <h2>{{ $name }}</h2>
                    @include('news.partials.product.product_rating')

                    <div class="product-price">{!! $htmlPrice !!}</div>

                    @include('news.partials.product.product_stock', ['quantity' => $items['quantity']])

                    <div class="sku"><span>SKU#: {{$sku}}</span></div>

                    {!! $short_description !!}
                    {!! $htmlAtribute !!}

                    <div class="quality-wrapper mt-30 product-quantity">
                        <label>Qty:</label>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" min="1">
                        </div>
                    </div>

                    @include('news.partials.product.product_list_action', ['quantity' => $items['quantity']])

                    <div class="social-icon mt-30">
                        <ul>
                            <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-social-skype"></i></a></li>
                            <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
