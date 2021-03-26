@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Product detail'])

    <!-- shop-area -->
    @include('news.pages.product.child-index.product_info')
    @include('news.pages.product.child-index.product_description')
    @include('news.pages.product.child-index.product_related')

    <!-- modal ?? -->
{{--    @include('news.partials.modal.article_detail')--}}

@endsection
