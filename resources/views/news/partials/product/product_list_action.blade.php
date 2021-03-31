<div class="product-list-action">
    
    @if ($quantity > 0)
        <div class="product-list-action-left">
            <a class="addtocart-btn" title="Add to cart" href="#"><i class="ion-bag"></i> Add to cart</a>
        </div>
    @endif
        
    @if($quickview == true)
        <div class="product-list-action-right">
            <a title="Wishlist" href="#"><i class="ti-heart"></i></a>
            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ti-plus"></i></a>
        </div>
    @endif
</div>

