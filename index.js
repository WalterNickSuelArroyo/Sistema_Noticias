$(document).ready(function () {
    verificar_sesion();
    llenar_zonas();
    function verificar_sesion() {
        funcion = 'verificar_sesion';
        $.post('controllers/UsuarioController.php', { funcion }, (response) => {
            if (response != '') {
                let sesion = JSON.parse(response);
                $('#nav_login').hide();
                $('#nav_register').hide();
                $('#usuario_nav').text(sesion.nombres);
            } else {
                $('#nav_usuario').hide();
            }
        })
    }
})