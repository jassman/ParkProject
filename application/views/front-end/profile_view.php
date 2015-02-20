
<main class="row main">
    <div class="col m12">
        <section class="col s12 m8 l9 profile">
            <div class="row profile-text">
                <div class="col s8 offset-s2">
                    <img class="circle responsive-img" src="<?php echo base_url(); ?>files/img/<?php echo $datos_usuario['foto']; ?>">
                </div>
                <div class="col s8 offset-s2">
                    <p>Hola <?php echo $datos_usuario['nombre'] ?> <?php echo $datos_usuario['apellido'] ?> </p>
                    <p>Correo Electronico: <?php echo $datos_usuario['email'] ?> </p>
                    <p>Cuenta desde: <?php echo $datos_usuario['fecha_creacion'] ?> </p>
                </div>
            </div>
        </section>
    </div>
</main>
</div>


