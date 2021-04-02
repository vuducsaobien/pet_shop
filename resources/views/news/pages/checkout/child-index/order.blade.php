@php
    use App\Helpers\Template;
    use App\Helpers\URL;

    // $cart = session()->get('cart');
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
    $total_quantity = 0;
    $total          = 0;
    foreach($items as $key => $value){
    $quantity        = $value['quantity'];
    $total_quantity += $quantity;
    $total          += $value['price'] * $quantity;
    }
    $total = Template::format_price($total, 'vietnamese dong');

@endphp

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="width-1">Tên Sản Phẩm</th>
                <th class="width-2">Giá</th>
                <th class="width-3">Số lượng</th>
                <th class="width-4">Tổng Giá Tiền</th>
            </tr>
        </thead>

        <tbody>
            @include('news.pages.checkout.child-index.order.table', [
                'total_quantity' => $total_quantity,
                'total'          => $total,
            ])
        </tbody>

    </table>
</div>

<div class="billing-back-btn">
    <span>
        Quên giỏ hàng ?
        <a href="{{ route('cart') }}"> Quay lại & Chỉnh sửa lại Giỏ Hàng.</a>

    </span>
    <div class="billing-btn">
        <button id="payment-6" type="submit">Xác Nhận Thanh Toán</button>
    </div>
</div>

