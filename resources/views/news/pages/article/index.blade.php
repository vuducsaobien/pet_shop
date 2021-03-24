@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.partials.breadcumb.breadcumb', ['name' => 'Blog'])

    <!-- list blog -->
    <div class="blog-area pt-100 pb-100 clearfix">
        <div class="container">
            <div class="row">
                @include('news.pages.article.child-index.list')
            </div>

            <!-- paginate -->
            <div class="pagination-style text-center mt-20">
                <ul>
                    <li>
                        <a href="#"><i class="icon-arrow-left"></i></a>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a class="active" href="#"><i class="icon-arrow-right"></i></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    
@endsection