<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('news.elements.head')
    </head>
    <body>

        @php
            $login    = false;
            $userInfo = null;
            if ( !empty(session()->get('userInfo')) ) {
                $login    = true;
                $userInfo = session()->get('userInfo');
            }

            $cartCheck = false;
            $cart      = null;
            if ( !empty(session()->get('cart')) ) {
                $cartCheck = true;
                $cart      = session()->get('cart');
            }

            // echo '<pre style="color:red";>$setting_price === '; print_r($setting_price);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
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
            if (login) {
                var userInfo       = JSON.parse(`<?= json_encode($userInfo) ?>`);
            }

            if (cartCheck) {
                var cart           = JSON.parse(`<?= json_encode($cart) ?>`);
            }
            var setting_price       = JSON.parse(`<?= json_encode($setting_price) ?>`);


        </script>

        @include('news.elements.script')

    </body>
</html>
