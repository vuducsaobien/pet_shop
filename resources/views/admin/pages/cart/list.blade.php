@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;

    // echo '<pre style="color:red";>$controllerName === '; print_r($controllerName);echo '</pre>';
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Mã Đơn Hàng</th>
                    <th class="column-title">Tên Sản Phẩm</th>
                    <th class="column-title">Số Lượng</th>
                    <th class="column-title">Giá</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày mua</th>
                    <th class="column-title">Chỉnh sửa</th>
                    {{-- <th class="column-title">Hành động</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];
                            $code            = Hightlight::show($val['order_code'], $params['search'], 'type');
                            $name            = Hightlight::show($val['name'], $params['search'], 'name');
                            $quantity        = $val['quantity'];
                            $price           = Template::format_price($val['price'],'vietnamese dong');
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $createdHistory  = Template::showItemHistory(null, $val['created'], 'created');
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="5%">
                                 {!! $code !!}
                            </td>
                            <td width="30%">
                                <p><strong>Tên SP:</strong> {!! $name !!}</p>
                                {{-- <p><strong>Thuộc Tính:</strong> {{ $attribute }}</p> --}}
                            </td>
                            <td>{{ $quantity }}</td>
                            <td>{!! $price !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td>
                            {{-- <td class="last">{!! $listBtnAction !!}</td> --}}
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
           