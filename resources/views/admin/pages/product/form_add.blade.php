@extends('admin.main')

@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');

    $thumb = $item['thumb'] ?? '';
    $thumbElement = sprintf('
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="thumb" value="%s">
    </div>
    <img id="holder" src="%s" style="margin-top:15px;max-height:100px;">
    ', $thumb, asset($thumb));

    $elements = [
        [
            'label'     => Form::label('name', 'Name', $formLabelAttr),
            'element'   => Form::text('name', $item['name'] ?? '', $formInputAttr)
        ],
        [
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr)
        ],
         [
            'label'     => Form::label('logo', 'Ảnh đại diện', $formLabelAttr),
            'element'   => $thumbElement
        ],
        [
            'label'     => Form::label('price', 'Price', $formLabelAttr),
            'element'   => Form::text('price', $item['price'] ?? '', $formInputAttr)
        ],
         [
            'element'   => $inputHiddenID.Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]


    ];
@endphp
{{--@dd($elements)--}}
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false])
    @include('admin.templates.error')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {!! Form::open([
                        'url' => route("$controllerName/save"),
                        'method' => 'POST',
                        'files' => true,
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'main-form'
                    ]) !!}
                    {!! FormTemplate::show($elements) !!}
                    {!! Form::close() !!}


                </div>

            </div>
        </div>
    </div>
@endsection

