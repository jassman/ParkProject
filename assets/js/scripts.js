/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    //home view

    $(".dropdown-button").dropdown({
        hover: false,
        inDuration: 400,
        outDuration: 200,
        alignment: 'right',
        constrain_width: true
    });


    //comunidad view
    $('.collapsible').collapsible({
        accordion: false
    });

    $('.modal-activar-mensaje').leanModal();

    $(window).scroll(function() {
        if ($(window).scrollTop() > 15) {
            $(".mensaje-flotante").fadeIn();
        } else {
            $(".mensaje-flotante").fadeOut();
        }
    });

    $('#ajax_mensaje').submit(function() {
        $mensaje = $('textarea').val(); // Nos devuelve el valor

        // Encapsulamos los datos a enviar en propiedades de un objeto Javascript
        $params = {'mensaje': $mensaje};

        // Lanzamos los datos al PHP
        $.post({
            url: $(this).attr('action'),
            data: $(this).serialize()
        }).done(function(data)
        {
            alert(data);
        });
    });



    //fin comunidad view



});

