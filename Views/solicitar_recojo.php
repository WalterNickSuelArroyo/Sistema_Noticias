<?php
include_once 'Layouts/general/header.php';
?>
<title>Solicitar Recojo | Sistema RBP</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Solicitar Recojo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Solicitar recojo</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <section class="content mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Solicitar recojo</h3>
                        </div>
                        <form id="form-solicitud_recojo" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="form-group m-4">
                                    <label for="id_zona">Zona a recoger</label>
                                    <select name="id_zona" id="id_zona" class="form-control" style="width:100%"></select>
                                </div>
                                <div class="form-group m-4">
                                    <label for="motivo" class="mt-4">Nos gustaria conocer el motivo de su solicitud</label>
                                    <textarea id="motivo" class="form-control" rows="3" style="resize: none;" name="motivo"></textarea>
                                </div>
                                <div class="form-group m-4">
                                    <label for="archivo" class="mt-4">Selecciona un archivo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="archivo" id="archivo">
                                            <label class="custom-file-label" for="archivo">Elija el archivo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer mt-4">
                                    <button type="button" class="btn btn-primary" id="btnEnviar">Enviar</button>
                                </div>
                            </div>

                        </form>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <div class="card-footer">
            Footer
        </div>
    </div>

</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Layouts/general/footer.php';
?>
<script src="solicitar_recojo.js"></script>