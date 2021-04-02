<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('news.elements.head')
    </head>
    <body>
        @php
            $login = false;
            if ( !empty(session()->get('userInfo')) ) {
                $login = true;
            }

            $cartCheck = false;
            if ( !empty(session()->get('cart')) ) {
                $cartCheck = true;
                $cart      = session()->get('cart');
            }
        @endphp

    	@include('news.elements.header')

        @yield('content')


    	@include('news.elements.footer')

		<!-- all js here -->
        <script type="text/javascript">
            var moduleName     = "admin";
            var controllerName = "{{ $controllerName }}";
            var login          = "{{ $login }}";
        </script>

        @include('news.elements.script')

    </body>
</html>
