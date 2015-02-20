
var pos;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

$(document).ready(function () {

    function CenterControl(controlDiv, map) {

        // Set CSS for the control border
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Click to recenter the map';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Center Map';
        controlUI.appendChild(controlText);

        // Inicializa el evente del boton y le da la funcion de poner el mapa en el centro de pos
        google.maps.event.addDomListener(controlUI, 'click', function () {
            map.setCenter(pos);
        });

    }

    function mi_marker() {

        directionsDisplay = new google.maps.DirectionsRenderer();

        if (navigator.geolocation) {
            //para ver todo el rato la posicion watchPosition
            navigator.geolocation.watchPosition(function (position) {

                pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);

                var miMarker = new google.maps.Marker({
                    position: pos,
                    map: map
                });


                map.setCenter(pos);
            });
        } else {
            alert("no geo! ACTUALIZA TU NAVEGADOR!");
        }

        var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map);

        centerControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById("panel-mapa"));
    }



    google.maps.event.addDomListener(window, 'load', mi_marker);
    
});
