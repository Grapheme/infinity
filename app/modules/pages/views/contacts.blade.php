@extends(Helper::layout())

@section('style')
@stop

@section('content')
{{ $content }}
@stop

@section('scripts')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA4Q5VgK-858jgeSbJKHbclop_XIJs3lXs&sensor=true"></script>
<script>

    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
        var styles = [
            {
                featureType: 'water',
                elementType: 'all',
                stylers: [
                    { hue: '#f8f8f8' },
                    { saturation: -100 },
                    { lightness: 89 },
                    { visibility: 'on' }
                ]
            },{
                featureType: 'landscape',
                elementType: 'all',
                stylers: [
                    { hue: '#97d7c4' },
                    { saturation: 24 },
                    { lightness: -19 },
                    { visibility: 'on' }
                ]
            }
        ];

        var mapOptions = {
            zoom : 16,
            scrollwheel : false,
            center : new google.maps.LatLng(55.83096, 37.931673),
            mapTypeId : 'Styled',
            disableDefaultUI: true,
            zoomControl: true
        }
        map = new google.maps.Map(document.getElementById('map-block'), mapOptions);
        var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
        map.mapTypes.set('Styled', styledMapType);

        var image = 'theme/img/marker.png';
        var image2 = 'theme/img/marker2.png';
        var infoWindow = new google.maps.InfoWindow({
            content: 'Московская область, г. Балашиха, Щелковское шоссе, 54-Б',
            maxWidth: 300
        });
        var myLatLng = new google.maps.LatLng(55.83096, 37.931673);
        var beachMarker = new google.maps.Marker({
            position : myLatLng,
            map : map,
            icon : image,
            title: 'Конферум'
        });
        google.maps.event.addListener(beachMarker, 'click', function() {
            if ( $(window).width() >= 768 ) {
                showAnimation();
            }
            else {
                infoWindow.open(map, beachMarker);
            }
        });
        google.maps.event.addListener(beachMarker, 'mouseover', function() {
            beachMarker.setIcon(image2);
        });
        google.maps.event.addListener(beachMarker, 'mouseout', function() {
            beachMarker.setIcon(image);
        });

    }
    initialize();
</script>

@stop