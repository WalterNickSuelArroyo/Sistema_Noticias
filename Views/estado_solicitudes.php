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
<title>Estado solicitudes | Sistema RBP</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Estado Solicitudes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Estado solicitudes</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <section class="content">
            <div class="row justify-content-center text-center mt-4">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Solicitudes</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="form-group">
                                <select id="inputStatus" class="form-control custom-select">
                                    <option selected="" disabled="">Seleccione un estado de la solicitud</option>
                                    <option>Activa</option>
                                    <option>Inactiva</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <div class="card-body">
            <table id="estado_solicitud" class="table table-hover">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Zona</th>
                        <th>Motivo</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                        <th>Estado</th>
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
<script src="Estado_solicitudes.js"></script>