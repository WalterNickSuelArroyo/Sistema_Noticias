<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro | Sistema RBP</title>
    <link rel="stylesheet" href="../Util/Css/css/all.min.css">
    <link rel="stylesheet" href="../Util/Css/adminlte.min.css">
    <link rel="stylesheet" href="../Util/Css/toastr.min.css">
    <link rel="stylesheet" href="../Util/Css/sweetalert2.min.css">
</head>
<body class="hold-transition login-page">
    <div class="mt-5">
        <div class="login-logo">
            <img src="../Util/Img/logo1.png" class="profile-user-img img-fluid img-circle">
            <a href="../index.php"><b>Noticias</b>Web</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Registrarse</p>
                <form id="form-register">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" name="nombres" class="form-control" id="nombres"
                                    placeholder="Ingrese sus nombres">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Ingrese su correo">
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input type="password" name="pass" class="form-control" id="pass"
                                    placeholder="Ingrese contraseña">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" id="apellidos"
                                    placeholder="Ingrese sus apelidos">
                            </div>
                            <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" id="telefono"
                                        placeholder="Ingrese su telefono">
                            </div>
                            <div class="form-group">
                                <label for="pass_repeat">Repetir contraseña</label>
                                <input type="password" name="pass_repeat" class="form-control" id="pass_repeat"
                                    placeholder="Ingrese nuevamente su contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary">Registrarme</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../Util/Js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../Util/Js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../Util/Js/adminlte.min.js"></script>
    <script src="../Util/Js/toastr.min.js"></script>
    <script src="register.js"></script>
    <script src="../Util/Js/jquery.validate.min.js"></script>
    <script src="../Util/Js/additional-methods.min.js"></script>
    <script src="../Util/Js/sweetalert2.min.js"></script>
    <script src="register.js"></script>
</body>
</html>