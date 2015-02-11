$(document).ready(function() {
    
    var poly;

    function initialize() {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {

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
                
                map.setCenter(pos);
            });
        } else {
            alert("no geo");
        }
        
        var polyOptions = {
            strokeColor: '#000000',
            strokeOpacity: 1.0,
            strokeWeight: 3
          }
          poly = new google.maps.Polyline(polyOptions);
          poly.setMap(map);    
          

    }
    
    google.maps.event.addDomListener(window, 'load', initialize);

});