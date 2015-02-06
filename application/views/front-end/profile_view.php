
<main class="row main">
    <div class="col m12">
        <section class="col s12 m8 l9 profile">

            <div class="row">
                <div class="col s4">
                    <img class="circle responsive-img" src="<?php echo base_url(); ?>files/img/<?php echo $datos_usuario['foto']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col s8">
                    <p>El nombre de usuario es: <?php echo $datos_usuario['nombre'] ?> <?php echo $datos_usuario['apellido'] ?> </p>
                    <p>El correo es: <?php echo $datos_usuario['email'] ?> </p>
                    <p>Cuenta desde: <?php echo $datos_usuario['fecha_creacion'] ?> </p>
                </div>
            </div>


            <?php
            ?>
        </section>
    </div>
</main>


