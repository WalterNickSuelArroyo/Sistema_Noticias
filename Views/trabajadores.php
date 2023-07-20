<?php
include_once 'Layouts/general/header.php';
?>
<div class="modal fade" id="modal_crear_trabajador" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Crear trabajador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-trabajador" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user">Nombre de usuario</label>
                        <input type="text" name="user" class="form-control" id="user" placeholder="Ingrese el nombre de usuario">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingrese la contraseña">
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres del trabajador</label>
                        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese el nombre del trabajador">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos del trabajador</label>
                        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese los apellidos del trabajador">
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI del trabajador</label>
                        <input type="text" name="dni" class="form-control" id="dni" placeholder="Ingrese el DNI del trabajador">
                    </div>
                    <div class="form-group">
                        <label for="email">Email del trabajador</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese el Email del trabajador">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono del trabajador</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese el telefono del trabajador">
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
<title>Trabajador | Sistema RBP</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Trabajadores <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_trabajador">Agregar trabajador</button></h1>
                <div class="row mt-3">
                    <div class="col-4">

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Trabajador</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <table id="trabajador" class="table table-hover">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Telefono</th>
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
<script src="trabajadores.js"></script>