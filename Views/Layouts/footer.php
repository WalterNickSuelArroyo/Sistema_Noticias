</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="Util/Js/jquery.min.js"></script>
<script src="Util/Js/bootstrap.bundle.min.js"></script>
<script src="Util/Js/adminlte.min.js"></script>
<script src="Util/Js/demo.js"></script>
<script src="Util/Js/bootstrap.min.js"></script>
<script src="../Util/Js/jquery.validate.min.js"></script>
<script src="../Util/Js/additional-methods.min.js"></script>
<script src="../Util/Js/select2.min.js"></script>
<script src="Util/Js/sweetalert2.min.js"></script>
<script src="../Util/Js/bs-custom-file-input.min.js"></script>
<script src="../Util/Js/toastr.min.js"></script>
<script src="../Util/Js/datatables.min.js"></script>
</body>
<script>
    funcion = 'tipo_usuario';
    $.post('Controllers/UsuarioController.php', {
        funcion
    }, (response) => {
        if (response==1) {
        } else if(response==2){
            $('#admin_usuarios').hide();
            $('#admin_citas').hide();
            $('#admin_noticias').hide();
        }
    })
</script>
</html>