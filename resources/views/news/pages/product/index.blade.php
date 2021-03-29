@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Product detail'])
    
    @php
        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';    
        // echo '<h3>Die is Called Blade</h3>';die;
    @endphp
    
    <!-- shop-area -->
    @include('news.pages.product.child-index.product_info')
    {{-- @include('news.pages.product.child-index.product_description')
    @include('news.pages.product.child-index.product_related') --}}

    <!-- modal ?? -->
{{--    @include('news.partials.modal.article_detail')--}}

@endsection
