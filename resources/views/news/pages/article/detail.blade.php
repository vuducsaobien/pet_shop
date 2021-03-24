@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.partials.breadcumb.breadcumb', ['name' => 'Blog Details'])

    <!-- shop-area -->
    @include('news.pages.article.child-index.shop_area')

    <!-- modal ?? -->
    @include('news.partials.modal.article_detail')

@endsection
