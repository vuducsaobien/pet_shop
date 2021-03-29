@php
    // echo '<pre style="color:red";>$linkProduct === Product Image === '; print_r($linkProduct);echo '</pre>';    
    // echo '<h3>Die is Called ProductImage</h3>';die;
@endphp

<div class="product-img">
    <a href="{{ $linkProduct }}">
        <img src="{{ asset($thumb) }}" alt="">
    </a>

    <div class="product-action">
        <a class="modal_quick_view" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="{{ $linkModal }}">
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


{{-- <div class="product-img">
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
</div> --}}
