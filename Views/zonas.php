<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_zona" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Crear zona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-zona" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombre">Nombre de la zona</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de la zona">
          </div>
          <div class="form-group">
            <label for="tipo">Tipo de zona</label>
            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Ingrese el tipo de zona">
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
<div class="modal fade" id="modal_editar_zona" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Editar zona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-zona-mod" enctype="multipart/form-data">
          <input type="hidden" id="id_zona_mod" name="id_zona_mod">
          <div class="form-group">
            <label for="nombre_mod">Nombre de la zona</label>
            <input type="text" name="nombre_mod" class="form-control" id="nombre_mod" placeholder="Ingrese el nombre de la zona">
          </div>
          <div class="form-group">
            <label for="tipo_mod">Tipo de zona</label>
            <input type="text" name="tipo_mod" class="form-control" id="tipo_mod" placeholder="Ingrese el tipo de zona">
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
<title>Zonas | Sistema RBP</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Zonas <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_zona">Agregar zona</button></h1>
        <div class="row mt-3">
          <div class="col-4">

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Zonas</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">
    <div class="card-body">
      <table id="zona" class="table table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
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
<script src="zonas.js"></script>