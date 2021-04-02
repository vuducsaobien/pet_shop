<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('news.elements.head')
    </head>
    <body>

        @php
            $login = false;
            if ( !empty(session()->get('userInfo')) ) {
                $login    = true;
                $userInfo = session()->get('userInfo');
            }

            $cartCheck = false;
            if ( !empty(session()->get('cart')) ) {
                $cartCheck = true;
                $cart      = session()->get('cart');
            }
        @endphp

    	@include('news.elements.header', [
            'login'     => $login,
            'userInfo'  => $userInfo,
            'cartCheck' => $cartCheck,
            'cart'      => $cart,
            ])


        @yield('content')


    	@include('news.elements.footer')

		<!-- all js here -->
        <script type="text/javascript">

            var controllerName = "{{ $controllerName }}";
            var login          = "{{ $login }}";
            var cartCheck      = "{{ $cartCheck }}";
            var userInfo       = JSON.parse(`<?= json_encode($userInfo) ?>`);
            var cart           = JSON.parse(`<?= json_encode($cart) ?>`);

        </script>

        @include('news.elements.script')

    </body>
</html>
