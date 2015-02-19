
<main class="row main">
    <div class="col m12">
        <section>
            <div class="row mapa-ruta">
                <div class="col s12">
                    <div class="mapa" id="mapa">
                        <?= $map['js'] ?>
                        <?= $map['html'] ?>
                    </div>     
                </div>
                <div class="col s12 panel" id="panel-mapa"></div>
            </div>
            <div class="row">
                <div class="col s4 offset-s2">
                    <button class="btn waves-effect waves-light" onclick="add_parkeasy()">PARKEASY</button>
                </div>
                <div class="col s4">
                    <button class="btn waves-effect waves-light"><a href="mapa">RECARGAR</a></button>
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
        </section>
    </div>
</main>
