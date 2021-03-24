<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('news.elements.head')
    </head>
    <body>

    	@include('news.elements.header')

        @yield('content')

    	@include('news.elements.footer')

		<!-- all js here -->
        @include('news.elements.script')

    </body>
</html>
