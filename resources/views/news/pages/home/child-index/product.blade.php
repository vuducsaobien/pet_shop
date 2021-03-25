@php
use App\Helpers\Template;
use App\Helpers\URL;
@endphp
@foreach($itemsProduct as $item)
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="product-wrapper mb-10">
        <div class="product-img">
            <a href="{{URL::linkProduct($item)}}">
                <img src= "{{ asset($item->thumb) }}" alt="">
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
                <span class="new">{{Template::format_price($item->sale)}} </span>
                <span class="old">{{Template::format_price($item->price)}}</span>
            </div>
        </div>
    </div>
</div>
@endforeach