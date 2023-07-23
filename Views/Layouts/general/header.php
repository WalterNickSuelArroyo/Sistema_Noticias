<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Util/Css/select2.min.css">
  <link rel="stylesheet" href="../Util/Css/css/all.min.css">
  <link rel="stylesheet" href="../Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="../Util/Css/sweetalert2.min.css">
  <link rel="stylesheet" href="../Util/Css/toastr.min.css">
  <link rel="stylesheet" href="../Util/Css/datatables.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item" id="nav_register">
            <a class="nav-link" href="register.php" role="button">
              <i class="fas fa-user-plus"></i> Registrarse
            </a>
          </li>
          <li class="nav-item" id="nav_login">
            <a class="nav-link" href="login.php" role="button">
              <i class="far fa-user"></i> Iniciar sesión
            </a>
          </li>
          <li class="nav-item dropdown" id="nav_usuario">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span id="usuario_nav">Usuario logueado</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="mi_perfil.php"><i class="fas fa-user-cog"></i> Mi perfil</a></li>
              <li><a class="dropdown-item" href="../Controllers/logout.php"><i class="fas fa-user-times"></i> Cerrar
                  sesión</a></li>
            </ul>
          </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="../index.php" class="brand-link">
        <img src="../Util/Img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NoticiasWeb</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item" id="noticias_menu">
              <a href="noticias.php" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Noticias
                </p>
              </a>
            </li>
            <li class="nav-item" id="citaciones">
              <a href="citas.php" class="nav-link">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>
                  Citaciones
                </p>
              </a>
            </li>
            <li class="nav-item" id="admin_usuarios">
              <a href="adminUsuarios.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Admin. de Usuarios
                </p>
              </a>
            </li>
            <li class="nav-item" id="admin_citas">
              <a href="adminCitas.php" class="nav-link">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>
                  Admin. de Citas
                </p>
              </a>
            </li>
            <li class="nav-item" id="admin_noticias">
              <a href="adminNoticias.php" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Admin. de Noticias
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">