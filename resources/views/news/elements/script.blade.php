<script src="{{asset('news/js/vendor/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('news/js/popper.js')}}"></script>
<script src="{{asset('news/js/bootstrap.min.js')}}"></script>
<script src="{{asset('news/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('news/js/waypoints.min.js')}}"></script>
<script src="{{asset('news/js/elevetezoom.js')}}"></script>
<script src="{{asset('news/js/ajax-mail.js')}}"></script>
<script src="{{asset('news/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('news/js/plugins.js')}}"></script>
<script src="{{asset('news/js/notify.js/notify.min.js')}}"></script>
@yield('script')
@if($controllerName == 'contact')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
    <script>
        function init() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: false,
                center: new google.maps.LatLng(40.709896, -73.995481),
                styles: 
                [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#F6AB44"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.709896, -73.995481),
                map: map,
                icon: 'assets/img/icon-img/map.png',
                animation:google.maps.Animation.BOUNCE,
                title: 'Snazzy!'
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endif
<script src="{{asset('news/js/main.js')}}"></script>

<script src="{{ asset('news/js/my-js.js') }}"></script>
<script src="{{ asset('news/js/functions.js') }}"></script>

