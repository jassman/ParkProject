
<main class="row main">
    <div class="col m12">
        <section class="col s12 m8 l6 offset-m2 offset-l3 profile">
            <div class="row profile-text">
                <div class="col s8 m6 l4 offset-s2 offset-m3 offset-l4">
                    <img class="circle responsive-img" src="<?php echo base_url(); ?>files/img/<?php echo $datos_usuario['foto']; ?>">
                </div>
                <div class="col s8 offset-s2">
                    <p>Hola <?php echo $datos_usuario['nombre'] ?></p>
                    <p>Eres de <?php echo $datos_usuario['ciudad'] ?></p>
                    <p>Correo Electronico: <?php echo $datos_usuario['email'] ?> </p>
                    <p>Cuenta desde: <?php echo $datos_usuario['fecha_creacion'] ?> </p>
                </div>
            </div>
        </section>
    </div>
</main>
</div>


