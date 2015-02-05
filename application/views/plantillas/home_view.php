<html>
    <head>
        <meta charset="utf-8">
        <title>Parkeasy</title>
        <link href="<?php echo base_url(); ?>assets/css/materialize.css" rel="stylesheet" type="text/css"  media="screen,projection">
        <link href="<?php echo base_url(); ?>assets/css/home_style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
                <iframe id="video-background"
                        src="http://www.youtube.com/embed/BlYD_WYuGuc?rel=0&controls=0&showinfo=0&autoplay=1&html5=1&allowfullscreen=true&wmode=transparent&loop=1&playlist=BlYD_WYuGuc" 
                        frameborder="0" allowfullscreen></iframe>
            <section class="row portada-inicio">
                <div class="col s8 offset-s2">
                    <h1>PARKEASY</h1>
                </div>            
            </section>
            <section>
                <div class="row">
                    <div class="col s8 m6 l4 offset-s2 offset-m3 offset-l4">
                        <?php if (isset($mensaje)): ?>
                            <?php if (is_array($mensaje)): ?>
                                <?php foreach ($mensaje as $var): ?>
                                    <?php echo "<p>" . $var . "</p>"; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php echo "<p>" . $mensaje . "</p>"; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>    
                </div>
            </section>    
            <section class="row contenedor-botones-inicio">
                <div class="col s8 m6 l4 offset-s2 offset-m3 offset-l4">
                    <div class="row">
                        <div class="col s8 m6 l4 offset-s2 offset-m3 offset-l4">
                            <a class="waves-effect waves-light btn-large boton-inicio modal-activar" href="#modal_entrar">Entrar</a>
                            <a class="waves-effect waves-light btn-large boton-inicio modal-activar" href="#modal_registrar">Registrarse</a>
                            <div id="modal_registrar" class="modal">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('login/register'); ?>">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="input-xlarge" id="nombre" name="nombre" required value="<?php echo set_value('nombre'); ?>">
                                        </div>
                                        <div class="input-field col s6">
                                            <label class="control-label" for="apellido">Apellido</label>
                                            <input type="text" class="input-xlarge" id="apellido" name="apellido" value="<?php echo set_value('apellido'); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <label class="control-label" for="user">Nombre Usuario</label>
                                            <input type="text" class="input-xlarge" id="user" name="user" value="<?php echo set_value('user'); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <label class="control-label" for="email">Contraseña</label>
                                            <input type="password" class="input-xlarge" id="password" name="password" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <label class="control-label" for="email">Email</label>
                                            <input type="text" class="input-xlarge" id="email" name="email" value="<?php echo set_value('email'); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <label class="control-label" for="foto">Foto</label>
                                            <input type="file" class="input-xlarge" name="foto" value="<?php echo set_value('foto'); ?>">
                                        </div>
                                    </div>                                 
                                    <div class="row">
                                        <div class="input-field">
                                            <input type="submit" value="Enviar formulario" id="enviar" name="enviar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="modal_entrar" class="modal">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('login'); ?>">
                                    <div class="row">
                                        <div class="input-field">
                                            <label class="control-label" for="login">Nombre Usuario</label>
                                            <input type="text" class="input-xlarge" id="login" name="login" value="<?php echo set_value('login'); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <label class="control-label" for="password">Contraseña</label>
                                            <input type="password" class="input-xlarge" id="password" name="password" value="">
                                        </div>
                                    </div> 	
                                    <div class="row">
                                        <div class="input-field">
                                            <input type="submit" value="Enviar formulario" id="enviar" name="enviar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>
 

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <script>

            $(document).ready(function() {
                $('.modal-activar').leanModal();

                $("#enviar").click(function() {
                    var importes = document.getElementById('nombre').value;
                    $("#nombre").val(importes);
                    var yes = document.getElementById('nombre').value;
                });

            });


        </script>
    </body>
</html>    

