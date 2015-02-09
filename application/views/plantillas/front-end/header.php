<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="description" content="App WEb">
        <meta name="author" content="JasMann">
        <title>parkeasy WebApp</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,700">
        <link href="<?php echo base_url(); ?>assets/css/materialize.css" rel="stylesheet" type="text/css"  media="screen,projection">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylemenu.css">
    </head>
    <body>
        <div id="wrapper" class="row wrapper">
            <header class="row header">
                <div class="col m8 offset-m2">
                    <h1>Parkeasy</h1>
                </div>
                <div class="col m2">
                    <!-- Dropdown Trigger -->
                    <a class='dropdown-button' href='#' data-activates='dropdown1'><i class="mdi-navigation-more-vert"></i></a>
                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="#!">Opciones</a></li>
                        <li><a href="#!">GPS</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">Reportar un error</a></li>
                        <li><a href="#!">Salir</a></li>
                    </ul>
                </div>
            </header>
