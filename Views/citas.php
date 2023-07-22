<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_cita" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Crear cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-cita" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fecha">Fecha de la cita</label>
            <input type="text" name="fecha" class="form-control" id="fecha" placeholder="Ingrese la fecha de la cita">
          </div>
          <div class="form-group">
            <label for="motivo">Motivo de la cita</label>
            <input type="text" name="motivo" class="form-control" id="motivo" placeholder="Ingrese el motivo de la cita">
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
<div class="modal fade" id="modal_editar_cita" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Editar cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-cita-mod" enctype="multipart/form-data">
          <input type="hidden" id="id_cita_mod" name="id_cita_mod">
          <div class="form-group">
            <label for="fecha_mod">Fecha de la cita</label>
            <input type="text" name="fecha_mod" class="form-control" id="fecha_mod" placeholder="Ingrese la fecha de la cita">
          </div>
          <div class="form-group">
            <label for="motivo_mod">Motivo de la cita</label>
            <input type="text" name="motivo_mod" class="form-control" id="motivo_mod" placeholder="Ingrese el motivo de la cita">
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
<title>Citas | NoticiasWeb</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Citas <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_cita">Agregar cita</button></h1>
        <div class="row mt-3">
          <div class="col-4">

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Citas</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-body">
      <table id="cita" class="table table-hover">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Motivo</th>
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
<script src="citas.js"></script>