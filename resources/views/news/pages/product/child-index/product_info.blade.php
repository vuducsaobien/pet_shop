@php
use App\Helpers\Template;

@endphp
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-img">
                    @if(count($item->image))
                    <img id="zoompro" src="{{asset('images/product_image/'.$item->image[0]->name)}}" data-zoom-image="assets/img/product-details/bl1.jpg" alt="zoom"/>
                    <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                        @foreach($item->image as $image)

                        <a data-image="assets/img/product-details/l1.jpg" data-zoom-image="assets/img/product-details/bl1.jpg">
                            <img src="{{asset('images/product_image/'.$image->name)}}" alt="">
                        </a>
                        @endforeach
{{--                        <a data-image="assets/img/product-details/l2.jpg" data-zoom-image="assets/img/product-details/bl2.jpg">--}}
{{--                            <img src="{{asset('images/product_image/s2.jpg')}}" alt="">--}}
{{--                        </a>--}}
{{--                        <a data-image="assets/img/product-details/l3.jpg" data-zoom-image="assets/img/product-details/bl3.jpg">--}}
{{--                            <img src="{{asset('images/product_image/s3.jpg')}}" alt="">--}}
{{--                        </a>--}}
{{--                        <a data-image="assets/img/product-details/l4.jpg" data-zoom-image="assets/img/product-details/bl4.jpg">--}}
{{--                            <img src="{{asset('images/product_image/s4.jpg')}}" alt="">--}}
{{--                        </a>--}}
{{--                        <a data-image="assets/img/product-details/l3.jpg" data-zoom-image="assets/img/product-details/bl3.jpg">--}}
{{--                            <img src="{{asset('images/product_image/s3.jpg')}}" alt="">--}}
{{--                        </a>--}}
                    </div>
                        @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content">
                    <h2>{{$item->name}}</h2>
                    <div class="product-rating">
                        <i class="ti-star theme-color"></i>
                        <i class="ti-star theme-color"></i>
                        <i class="ti-star theme-color"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <span> ( 01 Customer Review )</span>
                    </div>
                    <div class="product-price">
                        <span class="new">{{Template::format_price($item->sale)}}</span>
                        <span class="old">{{Template::format_price($item->price)}}</span>
                    </div>
                    <div class="in-stock">
                        <span><i class="ion-android-checkbox-outline"></i> In Stock</span>
                    </div>
                    <div class="sku">
                        <span>SKU#: MS04</span>
                    </div>
                    <p>Founded in 1989, Jack & Jones is a Danish brand that offers cool, relaxed designs that express a strong visual style through their diffusion lines, Jack & Jones intelligence and Jack & Jones vintage.</p>
                    <div class="product-details-style shorting-style mt-30">
                        <label>color:</label>
                        <select>
                            <option value=""> Choose an option</option>
                            <option value=""> orange</option>
                            <option value=""> pink</option>
                            <option value=""> yellow</option>
                        </select>
                    </div>
                    <div class="quality-wrapper mt-30 product-quantity">
                        <label>Qty:</label>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        </div>
                    </div>
                    <div class="product-list-action">
                        <div class="product-list-action-left">
                            <a class="addtocart-btn" href="#" title="Add to cart">
                                <i class="ion-bag"></i>
                                Add to cart
                            </a>
                        </div>
                        <div class="product-list-action-right">
                            <a href="#" title="Wishlist">
                                <i class="ti-heart"></i>
                            </a>
                        </div>
                    </div>
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
