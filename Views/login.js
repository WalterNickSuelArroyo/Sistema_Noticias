$(document).ready(function(){
    verificar_sesion();
    function verificar_sesion(){
        funcion = 'verificar_sesion';
        $.post('../controllers/UsuarioController.php',{funcion},(response)=>{
            if (response != '') {
                location.href = '../index.php';
            }
        })
    }
    $('#form-login').submit(e=>{
        var funcion = 'login';
        let email = $('#email').val();
        let pass = $('#pass').val();
        $.post('../Controllers/UsuarioController.php',{email,pass,funcion},(response)=>{
            if (response=='logueado') {
                toastr.success('*Logueado');
                location.href='../index.php';
            }
            else{
                toastr.error('*Usuario o contraseña incorrectas');
            }
        })
        e.preventDefault();
    })
})