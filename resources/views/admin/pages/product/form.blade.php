@extends('admin.main')

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')
    @include('admin.templates.zvn_notify')


    @if ( @$item['id'])
        <div class="row">
            @include('admin.pages.product.form_info')
            @include('admin.pages.product.form_category')
            @include('admin.pages.product.form_price')
            @include('admin.pages.product.form_special')
            @include('admin.pages.product.form_attribute')
            @include('admin.pages.product.form_dropzone')
        </div>
    @else
        @include('admin.pages.product.form_add')
    @endif
@endsection