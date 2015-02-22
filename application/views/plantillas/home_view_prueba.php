<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="description" content="App WEb">
        <meta name="author" content="JasMann">
        <title>parkeasy WebApp</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,700">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link href="<?php echo base_url(); ?>assets/css/materialize.css" rel="stylesheet" type="text/css"  media="screen,projection">
        <link href="<?php echo base_url(); ?>assets/css/home_style.css" rel="stylesheet" type="text/css">
    </head>
    <body>    
        <section class="row title">
            <div class="col s12">
                <h1>Parkeasy <span>.</span></h1>
            </div>
        </section>
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
        <section class="row main-log">
            <div class="col m4 l4 offset-m2 offset-l2 hide-on-small-only nexus">
                <img class="responsive-img" src="<?php echo base_url(); ?>assets/img/backgrounds/iphone.png" alt="">
            </div>
            <div class="col s10 m4 l4 offset-s1 form-login">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('login'); ?>">
                    <div class="row">
                        <div class="col s12">
                            <label for="login">Login:</label>
                            <input type="text" class="form-input" id="login" name="login" required value="<?php echo set_value('login'); ?>">
                        </div> 
                        <div class="col s12">
                            <label for="password">Password:</label>
                            <input type="password" class="form-input" id="password" name="password" value="">
                        </div> 
                    </div>
                    <div class="col s6">
                        <button type="submit" class="btn waves-effect waves-light light-blue">GO IN</button>
                    </div>      
                </form>
                <div class="col s6">
                    <button class="btn waves-effect waves-light light-blue modal-activar" href="#modal_registrar">REGISTER</button>
                </div>
                <div id="modal_registrar" class="modal">
                    <form class="form-horizontal" novalidate="novalidate" id="form-registro" method="post" enctype="multipart/form-data" action="<?php echo site_url('login/register'); ?>">
                        <div class="row modal-registrar">
                            <div class="col s6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-input" id="nombre" name="nombre" required value="<?php echo set_value('nombre'); ?>">
                            </div>
                            <div class="col s6">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-input" id="apellido" name="apellido" required value="<?php echo set_value('apellido'); ?>">
                            </div>
                            <div class="col s12">
                                <label  for="user">Nombre Usuario:</label>
                                <input type="text" class="form-input" id="user" name="user" required value="<?php echo set_value('user'); ?>">
                            </div>
                            <div class="col s12">
                                <label  for="password">Contraseña:</label>
                                <input type="password" class="form-input" id="password" name="password" value="">                       
                            </div>
                            <div class="col s12">
                                <label  for="password2">Repita contraseña:</label>
                                <input type="password" class="form-input" id="password2" name="password2" value="">                       
                            </div>
                            <div class="col s12">                           
                                <label class="control-label" for="email">Email:</label>
                                <input type="text" class="form-input" id="email" name="email" value="<?php echo set_value('email'); ?>">                       
                            </div>
                            <div class="col s12">                     
                                <div class="file-field input-field">
                                    <input class="file-path validate" type="text"/>
                                    <button class="btn waves-effect waves-light light-blue btn-foto">
                                        <span>Selecciona una foto (opcional)</span>
                                        <input type="file" class="form-input" name="foto" value="<?php echo set_value('foto') ?>"/>
                                    </button>                 
                                </div>
                            </div>
                            <div class="col s12">
                                <button class="btn waves-effect waves-light light-blue btn-foto">
                                    <input type="submit" id="enviar" name="enviar" value="ENVIAR"style="background-color: transparent; border: none;"> 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </section>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/external/materialize.js"></script> 
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/external/jquery.backstretch.min.js"></script> 
        <script>

            $(document).ready(function() {

                $.backstretch([
                    "<?php echo base_url(); ?>assets/img/backgrounds/fondo.png"
                            , "<?php echo base_url(); ?>assets/img/backgrounds/1.jpg"
                            , "<?php echo base_url(); ?>assets/img/backgrounds/fondo.png"
                ], {duration: 3000, fade: 750});

                $('.modal-activar').leanModal();

                $("#form-registro").validate({
                    rules: {
                        nombre: "required",
                        apellido: "required",
                        user: "required",
                        password: {
                            required: true,
                            minlength: 5
                        },
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        nombre: "Please enter your first name",
                        apellido: "Please enter your last name",
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        email: "Please enter a valid email address"                    
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }

                });


            });

        </script>
    </body>
</html>  