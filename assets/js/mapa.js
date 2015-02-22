$(document).ready(function () {


    var map;
    var markers = new Array();

    function initialize() {
        var mapOptions = {
            zoom: 6
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);



        // Try HTML5 geolocation
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {

                var pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);

                var infowindow = new google.maps.InfoWindow({
                    map: map,
                    position: pos,
                    content: 'Estas aqui!'
                });

                var miMarker = new google.maps.Marker({
                    position: pos,
                    map: map
                });

                $.getJSON('mapajs/get_markers', function (data) {
                    $.each(data, function (i, value) {
                        var pos = new google.maps.LatLng(parseFloat(value.pos_x), parseFloat(value.pos_y));
                        alert(pos);
                        var miMarker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            title: "Hello World!"
                        });
                        
                        map.addOverlay(miMarker);
                    });


                });



                for (var i = 0; i <= 5; i++) {

                    var pos = new google.maps.LatLng(parseFloat("39.500529") + i, parseFloat("-0.355709") + i);

                    var miMarker = new google.maps.Marker({
                        position: pos,
                        map: map
                    });


                }

                map.setCenter(pos);

            }, function () {

                handleNoGeolocation(true);
            });
        } else {
            // Browser doesn't support Geolocation
            handleNoGeolocation(false);
        }
    }

    function handleNoGeolocation(errorFlag) {

        if (errorFlag) {
            var content = 'Error: The Geolocation service failed.';
        } else {
            var content = 'Error: Your browser doesn\'t support geolocation.';
        }

        var options = {
            map: map,
            position: new google.maps.LatLng(60, 105),
            content: content
        };

        var infowindow = new google.maps.InfoWindow(options);
        map.setCenter(options.position);

    }




    function get_places(map) {

        $.post('mapajs/get_markers', function (data) {

            var result = data;

            $.each(result, function (i, val) {

                var x = result[i].pos_x;
                var y = result[i].pos_y;

                var tmpLatLng = new google.maps.LatLng(x, y);

                var marker = new google.maps.Marker({
                    map: map,
                    position: tmpLatLng
                });

                markers.push(marker);
            });


        });



    }

    google.maps.event.addDomListener(window, 'load', initialize);


});

