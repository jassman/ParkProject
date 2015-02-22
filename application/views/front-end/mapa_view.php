
<main class="row main">
    <div class="col s12">
        <section>
            <div class="row mapa-ruta">
                <div class="col s12">
                    <div class="mapa" id="mapa">
                        <?= $map['js'] ?>
                        <?= $map['html'] ?>
                    </div>     
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <button class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Añade un sitio en el mapa" onclick="confirm_add_parkeasy()">PARKEASY</button>
                </div>
                <div class="col s4">
                    <button class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Refresca el mapa"><a href="mapa">RECARGAR</a></button>
                </div>
                <div class="col s4">
                    <button class="btn waves-effect waves-light tooltipped" id="boton_ruta" data-position="top" data-delay="50" data-tooltip="Muestra u oculta" onclick="ruta_toggle()">OCULTAR RUTA</button>
                </div>
            </div>
            <div class="row">
                <div class="col s8 offset-s2" style="display:none;">
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
            <div class="row">
                <div class="col s12 col m8 col l8  offset-l2 offset-m2 panel" id="panel-mapa"></div>
            </div>
        </section>
    </div>
</main>
