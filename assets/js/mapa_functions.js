

    function datos_marker(lat, lng, marker) {
        var mi_marker = new google.maps.LatLng(lat, lng);
        map.panTo(mi_marker);
        google.maps.event.trigger(marker, 'click');
    }

    function confirm_add_parkeasy() {
        toast('<span>Añadir sitio</span><a class="btn-flat blue-text" href="#" onclick="add_parkeasy()">Confirmar<a>', 3000);
    }


    function add_parkeasy() {

        var latitud = pos.lat();
        var longitud = pos.lng();

        $.post(
                "mapa/parkeasy",
                {'latitud': latitud, 'longitud': longitud}
        )
                .done(function (data) {
                    toast(data, 4000);
                });
    }

    function ruta(lat, lng, marker) {

        var destino = new google.maps.LatLng(lat, lng);

        var request = {
            origin: pos,
            destination: destino,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
    }

    function ruta_toggle() {
        $("#panel-mapa").toggle();

        if ($("#boton_ruta").text() == "VER RUTA") {
            $("#boton_ruta").text("OCULTAR RUTA");
        } else {
            $("#boton_ruta").text("VER RUTA");        
        }
    }

    function getPosition (position) {

                pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);

                if(!miMarker){
                    miMarker = new google.maps.Marker({
                    position: pos,
                    map: map
                });
            }else{
                miMarker.setPosition(pos);
            }

                map.setCenter(pos); //Centra el mapa (cada vez que hay una nueva geolocalizacio (MOLESTO!!)
            }
            
            
     function errorGettingPosition (err) { 
         
	if (err.code == 1) { 
		alert ("Usuario negó geolocalización."); 
	} 
	else if (err.code == 2) { 
		alert ("Posición disponible."); 
	} 
	else if(err.code == 3) { 
		alert ("Tiempo de espera agotado."); 
	} 
	else if(err.code == 4) { 
		alert ("ERROR:" + err.message); 
	} 
    }
