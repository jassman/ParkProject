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
            <div class="col m3 l4 offset-m1 offset-l2 hide-on-small-only nexus">
                <img class="responsive-img image" src="<?php echo base_url(); ?>assets/img/backgrounds/iphone.png" alt="">
            </div>
            <div class="col s10 m6 l4 offset-s1 offset-m5 offset-l6 efecto-blur"></div>
            <div class="col s10 m6 l4 offset-s1 offset-m1 form-login">
                <form class="form-horizontal" id="form-entrar" method="post" enctype="multipart/form-data" action="<?php echo site_url('login'); ?>">
                    <div class="row">
                        <div class="col s12">
                            <label for="login">Login:</label>
                            <input type="text" class="form-input" id="login" name="login" required value="">
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
                            <div class="col s12">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-input" id="nombre" name="nombre" required value="<?php echo set_value('nombre'); ?>">
                            </div>
                            <div class="col s12">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" class="form-input" id="ciudad" name="ciudad" required value="<?php echo set_value('ciudad'); ?>">
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
                            <!--                            <div class="col s12">                     
                                                            <div class="file-field input-field">
                                                                <input class="file-path validate" type="text"/>
                                                                <button class="btn waves-effect waves-light light-blue btn-foto">
                                                                    <span>Selecciona una foto (opcional)</span>
                                                                    <input type="file" class="form-input" name="foto" value="<?php echo set_value('foto') ?>"/>
                                                                </button>                 
                                                            </div>
                                                        </div>-->
                            <div class="col s12">
                                <button class="btn waves-effect waves-light light-blue btn-foto">
                                    <input type="submit" id="enviar" name="enviar" value="ENVIAR"> 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </section>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/external/materialize.js"></script> 
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/external/jquery.backstretch.min.js"></script> 
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/scripts_home_view.js"></script>
        <script>
            $(document).ready(function() {

                $.backstretch([
                    "<?php echo base_url(); ?>assets/img/backgrounds/2.jpg"
                            , "<?php echo base_url(); ?>assets/img/backgrounds/1.jpg"
                            , "<?php echo base_url(); ?>assets/img/backgrounds/3.jpg"
                ], {duration: 5000, fade: 750});

            })

        </script>
    </body>
</html>  