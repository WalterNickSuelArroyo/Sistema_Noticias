<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_actividad" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Crear actividad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-actividad" enctype="multipart/form-data">
          <div class="form-group">
            <label for="hora_inicio">Hora de inicio de la actividad</label>
            <input type="text" name="hora_inicio" class="form-control" id="hora_inicio" placeholder="Ingrese la hora de inicio de la actividad">
          </div>
          <div class="form-group">
            <label for="hora_final">Hora del final de la actividad</label>
            <input type="text" name="hora_final" class="form-control" id="hora_final" placeholder="Ingrese la hora del final de la actividad">
          </div>
          <div class="form-group">
            <label>Trabajador asignado</label>
            <select id="id_usuario" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label>Zona asignada</label>
            <select id="id_zona" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label>Camion asignado</label>
            <select id="id_camion" class="form-control" style="width:100%" required></select>
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
<div class="modal fade" id="modal_editar_actividad" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Editar actividad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-actividad-mod" enctype="multipart/form-data">
          <input type="hidden" id="id_actividad_mod" name="id_actividad_mod">
          <div class="form-group">
            <label for="hora_inicio_mod">Hora de inicio de la actividad</label>
            <input type="text" name="hora_inicio_mod" class="form-control" id="hora_inicio_mod" placeholder="Ingrese la hora de inicio de la actividad">
          </div>
          <div class="form-group">
            <label for="hora_final_mod">Hora del final de la actividad</label>
            <input type="text" name="hora_final_mod" class="form-control" id="hora_final_mod" placeholder="Ingrese la hora del final de la actividad">
          </div>
          <div class="form-group">
            <label>Trabajador asignado</label>
            <select id="id_usuario_mod" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label>Zona asignada</label>
            <select id="id_zona_mod" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label>Camion asignado</label>
            <select id="id_camion_mod" class="form-control" style="width:100%" required></select>
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
<title>Actividades | Sistema RBP</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Actividades <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actividad">Agregar actividad</button></h1>
        <div class="row mt-3">
          <div class="col-4">

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Actividades</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">
    <div class="card-body">
      <table id="actividad" class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Hora de Inicio</th>
            <th>Hora final</th>
            <th>Trabajador</th>
            <th>Zona</th>
            <th>Camion</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
    <div class="card-footer">
      Footer
    </div>
  </div>
</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Layouts/general/footer.php';
?>
<script src="Actividades.js"></script>