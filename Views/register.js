$(document).ready(function () {
    var funcion;
    verificar_sesion();
    function verificar_sesion(){
        funcion = 'verificar_sesion';
        $.post('../controllers/UsuarioController.php',{funcion},(response)=>{
            if (response != '') {
                location.href = '../index.php';
            }
        })
    }
    $.validator.setDefaults({
        submitHandler: function () {
            let pass = $('#pass').val();
            let nombres = $('#nombres').val();
            let apellidos = $('#apellidos').val();
            let email = $('#email').val();
            let telefono = $('#telefono').val();
            funcion = "registrar_usuario";
            $.post('../Controllers/UsuarioController.php', { pass, nombres, apellidos, email, telefono, funcion }, (response) => {
                if (response == "success") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha registrado correctamente',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function(){
                        $('#form-register').trigger('reset');
                        location.href = '../Views/login.php';
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo error al registrarse, comuniquese con el equipo de soporte',
                    })
                }
            });
        }
    });
    jQuery.validator.addMethod("letras",
        function (value, element) {
            let variable = value.replace(/ /g, "");
            return /^[A-Za-z]+$/.test(variable);
        }
        , "*Este campo solo permite letras");
    $('#form-register').validate({
        rules: {
            nombres: {
                required: true,
                letras: true
            },
            apellidos: {
                required: true,
                letras: true
            },
            pass: {
                required: true,
                minlength: 8,
                maxlength: 20
            },
            pass_repeat: {
                required: true,
                equalTo: "#pass"
            },
            email: {
                required: true,
                email: true,
            },
            telefono: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 9
            },
        },
        messages: {
            pass: {
                required: "Este campo es obligatorio",
                minlength: "La contraseña debe ser minimo de 8 caracteres",
                maxlength: "La contraseña debe ser como máximo de 20 caracteres"
            },
            pass_repeat: {
                required: "Este campo es obligatorio",
                equalTo: "Las contraseñas no coinciden",
            },
            nombres: {
                required: "Este campo es obligatorio",
            },
            apellidos: {
                required: "Este campo es obligatorio",
            },
            email: {
                required: "Este campo es obligatorio",
                email: "No es formato email"
            },
            telefono: {
                required: "Este campo es obligatorio",
                minlength: "El teléfono debe ser de 9 caracteres",
                maxlength: "El teléfono debe ser de 9 caracteres",
                digits: "El teléfono solo esta compuesto por números"
            },
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