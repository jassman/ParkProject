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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylemenu.css">
    </head>
    <body>
        <ul id="dwopciones" class="dropdown-content">
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>

        <div id="wrapper" class="row wrapper">
            <header class="row header">
                <div class="col m8 offset-m2">
                    <h1>Parkeasy</h1>
                </div>
                <div class="col m2">
                   <a class='dropdown-button btn black' href='#' data-activates='dwopciones'><i class="mdi-navigation-more-vert"></i></a>
                </div>
            </header>