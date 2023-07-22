<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_usuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Crear usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-usuario" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese los nombres">
          </div>
          <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese los apellidos">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese Email">
          </div>
          <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingrese la contraseña">
          </div>
          <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese telefono">
          </div>
          <div class="form-group">
            <label for="tipo">Tipo (1=Administrador)(2=Usuario)</label>
            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Ingrese tipo de usuario (1 o 2)">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_editar_usuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-usuario-mod" enctype="multipart/form-data">
          <input type="hidden" id="id_usuario_mod" name="id_usuario_mod">
          <div class="form-group">
            <label for="nombres_mod">Nombres</label>
            <input type="text" name="nombres_mod" class="form-control" id="nombres_mod" placeholder="Ingrese los nombres">
          </div>
          <div class="form-group">
            <label for="apellidos_mod">Apellidos</label>
            <input type="text" name="apellidos_mod" class="form-control" id="apellidos_mod" placeholder="Ingrese los apellidos">
          </div>
          <div class="form-group">
            <label for="email_mod">Email</label>
            <input type="text" name="email_mod" class="form-control" id="email_mod" placeholder="Ingrese Email">
          </div>
          <div class="form-group">
            <label for="telefono_mod">Telefono</label>
            <input type="text" name="telefono_mod" class="form-control" id="telefono_mod" placeholder="Ingrese telefono">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<title>Admin. Usuarios | NoticiasWeb</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administración de Usuarios <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_usuario">Agregar usuario</button></h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-body">
      <table id="usuario" class="table table-hover">
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Tipo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Layouts/general/footer.php';
?>
<script src="adminUsuarios.js"></script>