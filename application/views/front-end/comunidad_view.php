<main class="row main">
    <section class="col s12 m10 l8 offset-m1 offset-l2">
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
                    <?php
                    foreach ($comentario['mensajes'] as $comentarios) {
                        ?>
                        <li>
                            <div class="collapsible-header">
                                <img class="circle responsive-img" style="max-width: 40px;" src="<?php echo base_url(); ?>files/img/<?= $comentarios['usuario']['foto']; ?>">
                                <?= $comentarios['usuario']['nombre'] ?><span><?= $comentarios['ciudad'] ?></span>
                            </div>
                            <div class="collapsible-body">
                                <p> <?= $comentarios['contenido'] ?></p>
                            </div>
                        </li>
                    <?php } ?> 
                </ul>
            </div>
            <div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 pag">
                <?= $this->pagination->create_links() ?>   
            </div>
            <!--            <a id="irArriba" href='URL_De_Facebook' style='position:fixed;bottom:185px;right:0px;'target='_blank'>
                            <img border='0' src='http://1.bp.blogspot.com/-7VSvlkal0os/UFORwVAFAZI/AAAAAAAAHkg/nhegYirxh5g/s1600/boton+facebook_opt.png' title='Seguirnos en Facebook'/>
                        </a>-->
        </div>
    </section>
</main>
<div class="mensaje-flotante">
    <a class="btn-floating btn-large waves-effect waves-light light-blue modal-activar-mensaje" href="#modal_mensaje"><i class="mdi-content-create"></i></a>
</div>
<div id="modal_mensaje" class="modal modal-mensaje">
    <form id="ajax_mensaje" action="<?php echo site_url('comunidad/add'); ?>" method="post">
        <div class="row">
            <div class="col s10">
                <textarea  type="text" id="mensaje" name="mensaje" required></textarea >
            </div> 
            <div class="col s2">
                <input type="submit" class="btn waves-effect waves-light light-blue btn-enviar"><i class="mdi-content-add"></i></button>
            </div> 
        </div>
    </form>
</div>

