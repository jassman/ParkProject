<main class="row main">
    <section class="col s12 m8 l6 offset-m2 offset-l3">
        <div class="row barra-filtros">
            <div class="col s12">
                <label>Filter:</label>
                <a class="" data-filter="all">All</a>
                <label>Ciudad:</label>
                <a class="" data-filter="all">Ciudad</a>
                <label>Ordenar:</label>
                <a class="" data-filter="all">Ascendente</a>
                <a class="" data-filter="all">Descendente</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m10 l10 offset-m1 offset-l1">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="mdi-image-filter-drama"></i>First<span></span></div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                    </li>
                </ul>
                
                    <?php
                    foreach ($comentario['mensajes'] as $comentarios) {
                        ?>
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header">
                                <img class="circle responsive-img" style="max-width: 40px;" src="<?php echo base_url(); ?>files/img/<?= $comentarios['usuario']['foto']; ?>">
                                <?= $comentarios['usuario']['nombre'] ?><span><?= $comentarios['ciudad'] ?></span>
                            </div>
                            <div class="collapsible-body">
                               <p> <?= $comentarios['contenido'] ?></p>
                            </div>
                        </li>
                    </ul><?php } ?>
                
            </div>
        </div>
    </section>
</main>
