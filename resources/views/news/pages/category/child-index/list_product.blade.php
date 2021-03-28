@php
    use App\Helpers\Template;
@endphp

@foreach($items as $key => $value)
@php
    $thumb             = $value['thumb'];
    $name              = $value['name'];
    $short_description = $value['short_description'];

    $sale              = $value['sale'];
    $price             = Template::format_price($value['price'], 'vietnamese dong');
    $price_sale        = Template::format_price($value['price_sale'], 'vietnamese dong');

    if ($sale > 0) {
        $HtmlPrice = '
            <span class="new">'.$price_sale.' </span>
            <span class="old">'.$price.'</span>
        ';
    } else {
        $HtmlPrice = '
            <span class="new">'.$price.' </span>
        ';
    }
    
@endphp

<div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
    <div class="product-wrapper mb-10">

        @include('news.pages.category.child-index.product_image')
        @include('news.pages.category.child-index.product_content')
        @include('news.pages.category.child-index.product_list_content')

    </div>
</div>
@endforeach

