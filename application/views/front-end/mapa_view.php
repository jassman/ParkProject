
<main class="row main">
    <div class="col m12">
        <script>
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
                            alert("Database updated");
                        });
            }

            function ruta(lat, lng, marker) {
                
                var mi_marker = new google.maps.LatLng(lat, lng);
                
                var request = {
                    origin: pos,
                    destination: mi_marker,
                    travelMode: google.maps.TravelMode.DRIVING
                };
                directionsService.route(request, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    }
            });
                

            }
        </script>
        <section>
            <div class="row">
                <div class="col-s4">
                    <div class="mapa" id="mapa">
                        <?= $map['js'] ?>
                        <?= $map['html'] ?>
                    </div>     
                </div>
                <div class="col-s4 panel" id="panel-mapa"></div>
            </div>
            <div class="row">
                <div class="col-s8 offset-s2 ">
                    <button class="btn" onclick="add_parkeasy()">Informa de un sitio</button>
                </div>
            </div>


            <div class="row">
                <div class="col s8 offset-s2">
                    <ul>
                        <?php
                        foreach ($datos as $marker_sidebar) {
                            ?><li onclick="ruta(<?= $marker_sidebar->pos_y ?>,<?= $marker_sidebar->pos_x ?>, marker_<?= $marker_sidebar->id ?>)">
                                <?= $marker_sidebar->id; ?>&nbsp;&nbsp;<?= substr($marker_sidebar->infowindow, 0, 14) ?></li><?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div style="width:300px;height:300px;" class="mapYou"></div>
            <p><span class="you">Where are you?</span></p>
        </section>
    </div>
</main>
