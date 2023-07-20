<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_camion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Crear Camion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-camion" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="placa">Placa del vehiculo</label>
                        <input type="text" name="placa" class="form-control" id="placa" placeholder="Ingrese la placa del vehiculo">
                    </div>
                    
                    <div class="form-group">
                        <label for="marca">Marca del camion</label>
                        <input type="text" name="marca" class="form-control" id="marca" placeholder="Ingrese la marca del camion">
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
<title>Camiones | Sistema RBP</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Camiones <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_camion">Agregar camion</button></h1>
                <div class="row mt-3">
                    <div class="col-4">

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Camiones</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <table id="camion" class="table table-hover">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
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
<script src="Camiones.js"></script>