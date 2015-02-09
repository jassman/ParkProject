
<main class="row main">
    <div class="col m12">
        <section>
            <div class="mapa">
                <?= $map['js'] ?>
                <?= $map['html'] ?>
                <ul>
                    <?php
                    foreach ($datos as $marker_sidebar) {
                        ?><li onclick="datos_marker(<?= $marker_sidebar->pos_y ?>,<?= $marker_sidebar->pos_x ?>, marker_<?= $marker_sidebar->id ?>)">
                            <?= $marker_sidebar->id; ?>&nbsp;&nbsp;<?= substr($marker_sidebar->infowindow, 0, 14) ?></li><?php
                    }
                    ?>
                </ul>
            </div>
            <div style="width:300px;height:300px;" class="mapYou"></div>
            <p><span class="you">Where are you?</span></p>
        </section>
    </div>
</main>
