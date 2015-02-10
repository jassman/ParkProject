$(document).ready(function () {


    var map;
    var markers;

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
                    content: 'Location found using HTML5.'
                });

                var miMarker = new google.maps.Marker({
                    position: pos,
                    map: map
                });

                map.setCenter(pos);
                get_places();
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


    function get_places() {

        $.ajax({
            type: "POST",
            url: "mapajs/get_markers",
            success: function (response) {

                    var places = response.places;

                    // loop through places and add markers
                    for(var i in places) {

                        //create gmap latlng obj
                        tmpLatLng = new google.maps.LatLng(places[i].pos_x, places[i].pos_y);

                        // make and place map maker.
                        var marker = new google.maps.Marker({
                            map: map,
                            position: tmpLatLng,
                        });

                        // not currently used but good to keep track of markers
                        markers.push(marker);
                }
            }
        });
        

    }

    google.maps.event.addDomListener(window, 'load', initialize);
//
//	var testigo=0;
//
//	$( ".you" ).click(function() {
//
//
//		if(testigo == 0){  //con testigo simplemente obtenemos si el mapa estÃ¡ mostrado o no. PodrÃ­a hacerse de maneras mÃ¡s elegantes obteniendo el valor del 'display' de '.mapYou'
//			getLocation(); 
//		} else {
//			$( ".mapYou" ).toggle(2000);
//		}
//	});
//
//
//	var x = getElementsByClassName("you")[0];
//
//	function getLocation() {
//
//	    testigo=1;
//	
//	    if (navigator.geolocation) {
//		navigator.geolocation.getCurrentPosition(showPosition,showError);
//	    } else {
//		x.innerHTML = "Geolocation is not supported by this browser.";
//	    }
//	}
//
//	function showPosition(position) {
//	    var latlon = position.coords.latitude+","+position.coords.longitude;
//	    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
//	    +latlon+"&zoom=14&size=400x300&sensor=false";
//	    document.getElementsByClassName("mapYou")[0].innerHTML = "<img src='"+img_url+"'>";
//            alert(latlon);
//		
//		$( ".mapYou" ).toggle(2000); //mostramos el mapa DESPUÃ‰S de obtenerlo
//	}
//
//	function showError(error) {
//	    switch(error.code) {
//		case error.PERMISSION_DENIED:
//		    x.innerHTML = "User denied the request for Geolocation."
//		    break;
//		case error.POSITION_UNAVAILABLE:
//		    x.innerHTML = "Location information is unavailable."
//		    break;
//		case error.TIMEOUT:
//		    x.innerHTML = "The request to get user location timed out."
//		    break;
//		case error.UNKNOWN_ERROR:
//		    x.innerHTML = "An unknown error occurred."
//		    break;
//	    }
//	}

});

