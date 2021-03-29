<div class="product-list-content">
    <h4><a href="#">{{ $name }}</a></h4>
    <div class="product-price">
        {!! $HtmlPrice !!}
    </div>

    {!! $short_description !!}
    
    <div class="product-list-action">
        <div class="product-list-action-left">
            <a class="addtocart-btn" title="Add to cart" href="#"><i class="ion-bag"></i> Add to cart</a>
        </div>
        <div class="product-list-action-right">
            <a title="Wishlist" href="#"><i class="ti-heart"></i></a>
            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ti-plus"></i></a>
        </div>
    </div>
</div>
