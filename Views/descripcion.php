<?php
if (!empty($_GET['id']) && $_GET['name']) {
    session_start();
    $_SESSION['zona-verification'] = $_GET['id'];
    //echo $_SESSION['zona-verification'];
    include_once 'Layouts/general/header.php'
        ?>
    <title>
        <?php echo $_GET['name'] ?> | SistemaRBP
    </title>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?php echo $_GET['name'] ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?php echo $_GET['name'] ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div id="mapa" class="col-12 text-center">

                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="zona-tab" role="tablist">
                        <a class="nav-item nav-link active" id="zona-desc-tab" data-toggle="tab" href="#zona-desc"
                            role="tab" aria-controls="zona-desc" aria-selected="true">Descripción</a>
                        <a class="nav-item nav-link" id="zona-caract-tab" data-toggle="tab" href="#zona-caract"
                            role="tab" aria-controls="zona-caract" aria-selected="false">Caracteristicas</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="zona-desc" role="tabpanel"
                        aria-labelledby="zona-desc-tab">
                        descripcion
                    </div>
                    <div class="tab-pane fade" id="zona-caract" role="tabpanel" aria-labelledby="zona-caract-tab">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Caracteristica</th>
                                    <th scope="col">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody id="caracteristicas">

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <?php
    include_once 'Layouts/general/footer.php';
} else {
    header('Location:../index.php');
}
?>
<script src="descripcion.js"></script>