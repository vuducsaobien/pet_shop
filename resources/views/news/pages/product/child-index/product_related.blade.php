@php
use App\Helpers\Template;
use App\Helpers\URL;

@endphp
<div class="related-product-area pt-95 pb-80 gray-bg">
    <div class="container">
        <div class="section-title text-center mb-55">
            <h4>Most Populer</h4>
            <h2>Related Products</h2>
        </div>
        <div class="related-product-active owl-carousel">
            @foreach($itemsRelatedProduct as $item)
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="{{$item->thumb}}" alt="">
                    </a>
                    <div class="product-action">
                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                            <i class="ti-plus"></i>
                        </a>
                        <a title="Add To Cart" href="#">
                            <i class="ti-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="product-action-wishlist">
                        <a title="Wishlist" href="#">
                            <i class="ti-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="{{URL::linkProduct($item)}}">{{$item->name}}</a></h4>
                    <div class="product-price">
                        <span class="new">{{Template::format_price($item->sale)}}</span>
                        <span class="old">{{Template::format_price($item->price)}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
