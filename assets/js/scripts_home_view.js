$(document).ready(function() {

                $.backstretch([
                    "<?php echo base_url(); ?>assets/img/backgrounds/fondo.png"
                    , "<?php echo base_url(); ?>assets/img/backgrounds/1.jpg"
                    , "<?php echo base_url(); ?>assets/img/backgrounds/fondo.png"
                ], {duration: 3000, fade: 750});

                $('.modal-activar').leanModal();

                jQuery.extend(jQuery.validator.messages, {
                    required: "El campo es obligatorio.",
                    remote: "Please fix this field.",
                    email: "Por favor introduzca un email valido.",
                    url: "Por favor introduzca una URL valida.",
                    date: "Por favor introduzca una fecha valida.",
                    dateISO: "Por favor introduzca un dato valido (ISO).",
                    number: "Por favor introduzca numeros validos.",
                    digits: "Por favor introduzca solo digitos.",
                    creditcard: "Por favor introduzca un numero de credito valido.",
                    equalTo: "Por favor introduzca lo mismo otra vez.",
                    accept: "Por favor introduzca una extension valida.",
                    maxlength: jQuery.validator.format("Maximo {0} caracteres."),
                    minlength: jQuery.validator.format("Minimo {0} caracteres."),
                    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
                });


                $("#form-entrar").validate({
                    rules: {
                        login: {
                            required: true,
                            minlength: 3,
                            maxlength: 25
                        },
                        password: {
                            required: true,
                            minlength: 3
                        }
                    },
                    errorElement: "div",
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                $("#form-registro").validate({
                    rules: {
                        nombre: {
                            required: true,
                            minlength: 2,
                            maxlength: 30
                        },
                        apellido: {
                            required: true,
                            minlength: 2,
                            maxlength: 30
                        },
                        user: {
                            required: true,
                            minlength: 3,
                            maxlength: 25
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        password2: {
                            required: true
//                            equalTo: password
                        },
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    errorElement: "div",
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
