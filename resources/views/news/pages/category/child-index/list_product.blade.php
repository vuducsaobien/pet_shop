@php
    use App\Helpers\Template;
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@foreach($items as $key => $value)
    @php
        $id         = $value['id'];
        $linkModal  = route('product/modal', ['id' => $id]);
        $sale       = $value['sale'];
        $price      = Template::format_price($value['price'], 'vietnamese dong');
        $price_sale = Template::format_price($value['price_sale'], 'vietnamese dong');
        $thumb      = $value['thumb'];
        $name       = $value['name'];
        $short_description = $value['short_description'];

        $HtmlPrice = Template::caculatorPriceFrontend($value['price'], $value['price_sale'], $value['sale']);
        
    @endphp

    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
        <div class="product-wrapper mb-10">

            @include('news.pages.category.child-index.product_image')
            @include('news.pages.category.child-index.product_content')
            @include('news.pages.category.child-index.product_list_content')

        </div>
    </div>
@endforeach
