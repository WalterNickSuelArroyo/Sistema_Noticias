<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_noticia" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLable">Crear noticia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-noticia" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fecha">Fecha de la noticia</label>
            <input type="text" name="fecha" class="form-control" id="fecha" placeholder="Ingrese la fecha de la noticia">
          </div>
          <div class="form-group">
            <label for="titulo">Titulo de la noticia</label>
            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ingrese el titulo de la noticia">
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
<title>Admin. Noticias | NoticiasWeb</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administracion de de Noticias <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_noticia">Crear Noticia</button></h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-body">
      <table id="noticia" class="table table-hover">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Autor</th>
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
<script src="adminNoticias.js"></script>