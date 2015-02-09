jQuery(document).ready(function(){

            function datos_marker(lat, lng, marker)
            {
                var mi_marker = new google.maps.LatLng(lat, lng);
                map.panTo(mi_marker);
                google.maps.event.trigger(marker, 'click');
            }

          


});