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
                $userInfoJs = json_encode($userInfo);

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
            var userInfo      = "{{ $userInfoJs }}";



        </script>

        @include('news.elements.script')

    </body>
</html>
