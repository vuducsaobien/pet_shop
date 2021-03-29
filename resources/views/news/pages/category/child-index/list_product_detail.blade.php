@php
    use App\Helpers\Template;
    use App\Helpers\URL;
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@foreach($items as $key => $value)
    @php
        $id        = $value['id'];
        $linkModal = URL::linkModal($id);
        $thumb     = $value['thumb'];
        $name      = $value['name'];
        $HtmlPrice = Template::caculatorPriceFrontend($value['price'], $value['price_sale'], $value['sale']);
        $short_description = $value['short_description'];
    @endphp

    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
        <div class="product-wrapper mb-10">

            @include('news.pages.category.child-index.product_image')
            @include('news.pages.category.child-index.product_content')
            @include('news.pages.category.child-index.product_list_content')

        </div>
    </div>
@endforeach
