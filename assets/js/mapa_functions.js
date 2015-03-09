

    function datos_marker(lat, lng, marker) {
        var mi_marker = new google.maps.LatLng(lat, lng);
        map.panTo(mi_marker);
        google.maps.event.trigger(marker, 'click');
    }

    function confirm_add_parkeasy() {
        toast('<span>Añadir sitio</span><a class="btn-flat blue-text" href="#" onclick="add_parkeasy()">Confirmar<a>', 3000);
    }

    function getCoordenadas() {
        return pos;
        setInterval(getCoordenadas, 2000);
    }

    function add_parkeasy() {

        var latitud = pos.lat();
        var longitud = pos.lng();

        $.post(
            "index.php/mapa/parkeasy/lat/" + latitud +"/lng/" + longitud
        //cuando la funcion se ha ejecutado le envio la informacion de servidor
        ).done(function (data) {
                toast(data, 4000);
            });         
    }
    //maker lo paso en la llamada debe estar.. es el id (no valido)
    function ruta(lat, lng, id_marker) {
        
        lat_destino = lat;
        lng_destino = lng;
        id_marker_destino = id_marker;

        var destino = new google.maps.LatLng(lat_destino, lng_destino);

        var request = {
            origin: pos,
            destination: destino,
            travelMode: google.maps.TravelMode.DRIVING,
            provideRouteAlternatives: true
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
        
        //creo un marker si no existe
        if(!miMarker){
            miMarker = new google.maps.Marker({
            position: pos,
            map: map
            });
        }else{
            miMarker.setPosition(pos);
        }
        
        //Solo lo centro una vez
        if(getCenterMap) {
            map.setCenter(pos);
            getCenterMap = false;
        }
        
        //Recalcula la ruta por geolocalizacion
//        if (lat_destino != null && lng_destino != null){
//            ruta(lat_destino, lng_destino, id_marker_destino);
//        }
           
        }
            
            
     function errorGettingPosition (err) { 
         
	if (err.code == 1) { 
		alert ("Usuario negó geolocalización."); 
	} 
	else if (err.code == 2) { 
		alert ("Posición no disponible."); 
	} 
	else if(err.code == 3) { 
		alert ("Tiempo de espera agotado."); 
	} 
	else if(err.code == 4) { 
		alert ("ERROR:" + err.message); 
	} 
    }
    
