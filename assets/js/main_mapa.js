/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
