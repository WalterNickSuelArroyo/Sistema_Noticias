<?php
include_once 'Layouts/general/header.php';
?>
<title>Mis actividades | Sistema RBP</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mis Actividades</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Mis actividades</li>
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
                            <h3 class="card-title">Estado de mis actividades</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="form-group">
                                <select id="inputStatus" class="form-control custom-select">
                                    <option selected="" disabled="">Seleccione un estado</option>
                                    <option>En curso</option>
                                    <option>Finalizada</option>
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
            <table id="estado_actividad_trabajador" class="table table-hover">
                <thead>
                    <tr>
                        <th>Hora de inicio</th>
                        <th>Hora final</th>
                        <th>Trabajador</th>
                        <th>Zona</th>
                        <th>Camion</th>
                        <th>Estado</th>
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
<script src="estado_actividad_trabajador.js"></script>