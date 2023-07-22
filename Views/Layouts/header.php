<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Util/Css/css/all.min.css">
  <link rel="stylesheet" href="../Util/Css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="Util/Css/sweetalert2.min.css">
  <link rel="stylesheet" href="../Util/Css/toastr.min.css">
  <link rel="stylesheet" href="../Util/Css/datatables.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        </li>
        <li class="nav-item" id="nav_register">
          <a class="nav-link" href="Views/register.php" role="button">
            <i class="fas fa-user-plus"></i> Registrarse
          </a>
        </li>
        <li class="nav-item" id="nav_login">
          <a class="nav-link" href="Views/login.php" role="button">
            <i class="far fa-user"></i> Iniciar sesión
          </a>
        </li>
        <li class="nav-item dropdown" id="nav_usuario">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span id="usuario_nav">Usuario logueado</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Views/mi_perfil.php"><i class="fas fa-user-cog"></i> Mi perfil</a></li>
            <li><a class="dropdown-item" href="Controllers/logout.php"><i class="fas fa-user-times"></i> Cerrar
                sesión</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index.php" class="brand-link">
        <img src="Util/Img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NoticiasWeb</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li id="noticias_menu" class="nav-item">
              <a href="Views/noticias.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Noticias
                </p>
              </a>
            </li>
            <li id="citaciones" class="nav-item">
              <a href="Views/citas.php" class="nav-link">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>
                  Citaciones
                </p>
              </a>
            </li>
            <li id="admin_usuarios" class="nav-item">
              <a href="Views/adminUsuarios.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Admin. Usuarios
                </p>
              </a>
            </li>
            <li id="admin_citas" class="nav-item">
              <a href="Views/camiones.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Admin. Citas
                </p>
              </a>
            </li>
            <li id="admin_noticias" class="nav-item">
              <a href="Views/camiones.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Admin. Noticias
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">