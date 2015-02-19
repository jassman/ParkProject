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

function add_parkeasy() {

    var latitud = pos.lat();
    var longitud = pos.lng();

    $.post(
            "mapa/parkeasy",
            {'latitud': latitud, 'longitud': longitud}
    )
            .done(function (data) {
                if (data == true){
                    alert("database updated");
                }else{
                alert("No puedes poner mas puntos");
            }
            });
}

function ruta(lat, lng, marker) {

    var mi_marker = new google.maps.LatLng(lat, lng);

    var request = {
        origin: pos,
        destination: mi_marker,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
}
