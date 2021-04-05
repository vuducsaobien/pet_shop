@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Mã Đơn Hàng</th>
                    <th class="column-title">Thông tin Khách Hàng</th>
                    <th class="column-title">Tên Sản Phẩm</th>
                    <th class="column-title">Số Lượng</th>
                    <th class="column-title">Giá</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày mua</th>
                    <th class="column-title">Chỉnh sửa</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index        = $key + 1;
                            $class        = ($index % 2 == 0) ? "even" : "odd";
                            $id           = $val['id'];
                            $code         = Hightlight::show($val['order_code'], $params['search'], 'type');
                            $customerName = Hightlight::show($val['name'], $params['search'], 'type');
                            $email        = Hightlight::show($val['email'], $params['search'], 'type');
                            $address      = Hightlight::show($val['address'], $params['search'], 'type');
                            $detail = $val['detail'];
                            $productName = '';
                            foreach ($detail as $keyB => $valB) {
                                $price    = Template::showItemCart($valB['price'] / $valB['quantity'], 'primary');
                                $quantity = Template::showItemCart($valB['quantity'], 'info', 'dont_format');
                                $total    = Template::showItemCart($valB['price'], 'success');

                                $productName  .= '- ' . 
                                    $valB['name'] 
                                    . '<br>' . 
                                    $valB['detail'] 
                                    . '<br>' .
                                    "$price x $quantity = $total"
                                    . '<br>'
                                    ;

                            }
                            

                            $quantity        = $val['quantity'];
                            $price           = Template::format_price($val['amount'],'vietnamese dong');
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $createdHistory  = Template::showItemHistory(null, $val['created'], 'created');
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);

                            // $address         = Hightlight::show($val['address'], $params['search'], 'address');
                            // $email           = Hightlight::show($val['email'], $params['search'], 'email');
                            // $star            = $val['star'];
                            // $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            // $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">

                            <td >{{ $index }}</td>
                            <td width="5%">{!! $code !!}</td>
                            <td width="20%">

                                <p><strong>- Tên:</strong> {!! $customerName !!}</p>
                                <p><strong>- Email:</strong> {!! $email !!}</p>
                                <p><strong>- Địa chỉ:</strong> {!! $address !!}</p>

                            </td>
                            <td width="20%">
                                {!! $productName !!}
                            </td>

                            <td width="5%">{{ $quantity }}</td>
                            <td width="10%">{!! $price !!}</td>
                            <td>{!! $status !!}</td>
                            <td width="8%">{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td>
                            <td class="last">{!! $listBtnAction !!}</td>

                        </tr>

                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
           