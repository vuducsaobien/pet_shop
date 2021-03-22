@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;

@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">STT</th>
                    <th class="column-title">Tên</th>
                    <th class="column-title">Thumb</th>
                    <th class="column-title">Price</th>
                    <th class="column-title">Category</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $item)


                        @php

                            $index          = $key + 1;
                            $name           = HightLight::show($item['name'], $params['search'], 'name');
                            $price           = HightLight::show($item['price'], $params['search'], 'price');
                            $category        = Form::select('category_id', $itemsCategory, $item['category_id'], ['class' => 'form-control select-ajax', 'data-url' => route("$controllerName/change-category", ['id' => $item->id, 'category_id' => 'value_new'])]);

                            $status          = Template::showItemStatus($controllerName, $item->id, $item['status']);



                            $actionButtons  = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{$index}}</td>
                            <td>{!! $name !!}</td>
                            <td>

                                    <img width="150" height="70" src="{{$item->thumb}}" alt="">
                            </td>
                            <td>{!! $price !!}</td>
                            <td>{!! $category !!}</td>
                            <td>{!! $status !!}</td>
                            <td class="last">{!! $actionButtons !!}</td>
                        </tr>
                    @endforeach

                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
