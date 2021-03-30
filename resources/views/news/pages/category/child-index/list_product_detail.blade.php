@php
    use App\Helpers\Template;
    use App\Helpers\URL;
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@foreach($items as $key => $value)
    @php
        $id                = $value['id'];
        $linkModal         = URL::linkModal($id);
        $linkProduct       = URL::linkProduct($value);
        $thumb             = $value['thumb'];
        $name              = $value['name'];
        $quantity          = $value['quantity'];
        $htmlPrice         = Template::caculatorPriceFrontend($value['price'], $value['price_sale'], $value['sale']);
        $short_description = $value['short_description'];
    @endphp

    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
        <div class="product-wrapper mb-10">

            @include('news.partials.product.product_image', ['linkProduct' => $linkProduct])
            @include('news.partials.product.product_content')
            @include('news.partials.product.product_list_content', ['quantity' => $quantity])

        </div>
    </div>
@endforeach
