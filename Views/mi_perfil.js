$(document).ready(function () {
    bsCustomFileInput.init();
    verificar_sesion();
    obtener_datos();
    function verificar_sesion() {
        funcion = 'verificar_sesion';
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            if (response != '') {
                let sesion = JSON.parse(response);
                $('#nav_login').hide();
                $('#nav_register').hide();
                $('#usuario_nav').text(sesion.nombres);
            } else {
                $('#nav_usuario').hide();
                location.href = 'login.php';
            }
        })
    }
    function obtener_datos() {
        funcion = 'obtener_datos';
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            let usuario = JSON.parse(response);
            $('#nombres').text(usuario.nombres);
            $('#apellidos').text(usuario.apellidos);
            $('#direccion').text(usuario.direccion);
            $('#email').text(usuario.email);
            $('#telefono').text(usuario.telefono);
            $('#tipo_usuario').text(usuario.tipo_usuario);
        })
    }
    $(document).on('click', '.editar_datos', (e) => {
        funcion = "obtener_datos";
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            let usuario = JSON.parse(response);
            $('#nombres_mod').val(usuario.nombres);
            $('#apellidos_mod').val(usuario.apellidos);
            $('#direccion_mod').val(usuario.direccion);
            $('#email_mod').val(usuario.email);
            $('#telefono_mod').val(usuario.telefono);
        })
    })
    $.validator.setDefaults({
        submitHandler: function () {
            funcion = "editar_datos";
            let datos = new FormData($('#form-datos')[0]);
            datos.append("funcion", funcion);
            $.ajax({
                type: "POST",
                url: '../Controllers/UsuarioController.php',
                data: datos,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response == "success") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se ha editado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            verificar_sesion();
                            obtener_datos();
                        })
                    } else if (response == 'danger') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'No altero ningun cambio',
                            text: 'Modifique algun cambio para realizar la edicion',
                        })
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo conflicto al editar sus datos, comuniquese con el area de soporte',
                        })
                    }
                }
            })
        }
    });
    jQuery.validator.addMethod("letras",
        function (value, element) {
            let variable = value.replace(/ /g, "");
            return /^[A-Za-z]+$/.test(variable);
        }
        , "*Este campo solo permite letras");
    $('#form-datos').validate({
        rules: {
            nombres_mod: {
                required: true,
                letras: true
            },
            apellidos_mod: {
                required: true,
                letras: true
            },
            direccion_mod: {
                required: true,
            },
            email_mod: {
                required: true,
                email: true,
            },
            telefono_mod: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 9
            },
        },
        messages: {
            nombres_mod: {
                required: "Este campo es obligatorio",
            },
            apellidos_mod: {
                required: "Este campo es obligatorio",
            },
            direccion_mod: {
                required: "Este campo es obligatorio",
            },
            email_mod: {
                required: "Este campo es obligatorio",
                email: "No es formato email"
            },
            telefono_mod: {
                required: "Este campo es obligatorio",
                minlength: "El teléfono debe ser de 9 caracteres",
                maxlength: "El teléfono debe ser de 9 caracteres",
                digits: "El teléfono solo esta compuesto por números"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }
    });
    $.validator.setDefaults({
        submitHandler: function () {
            funcion = "cambiar_contra";
            let pass_old = $('#pass_old').val();
            let pass_new = $('#pass_new').val();
            $.post('../Controllers/UsuarioController.php', { funcion, pass_old, pass_new}, (response => {
                if (response == "success") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha cambiado su contraseña',
                        showConfirmButton: false,
                        timer: 1200
                    }).then(function () {
                        $('#form-contra').trigger('reset');
                    })
                } else if (response = "error") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Contraseña incorrecta',
                        text: 'Ingrese su contraseña actual para poder cambiarla',
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo conflicto al editar sus datos, comuniquese con el area de soporte',
                    })
                }
            }))
        }
    });
    jQuery.validator.addMethod("letras",
        function (value, element) {
            let variable = value.replace(/ /g, "");
            return /^[A-Za-z]+$/.test(variable);
        }
        , "*Este campo solo permite letras");
    $('#form-contra').validate({
        rules: {
            pass_old: {
                required: true,
                minlength: 8,
                maxlength: 20
            },
            pass_new: {
                required: true,
                minlength: 8,
                maxlength: 20
            },
            pass_repeat: {
                required: true,
                equalTo: "#pass_new"
            }
        },
        messages: {
            pass_old: {
                required: "Este campo es obligatorio",
                minlength: "La contraseña debe ser minimo de 8 caracteres",
                maxlength: "La contraseña debe ser como máximo de 20 caracteres"
            },
            pass_new: {
                required: "Este campo es obligatorio",
                minlength: "La contraseña debe ser minimo de 8 caracteres",
                maxlength: "La contraseña debe ser como máximo de 20 caracteres"
            },
            pass_repeat: {
                required: "Este campo es obligatorio",
                equalTo: "Las contraseñas no coinciden",
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }
    });
})