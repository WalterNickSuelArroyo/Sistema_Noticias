<?php
include_once 'Layouts/general/header.php';
?>
<title>Noticias | NoticiasWeb</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Noticias</h1>
                <div class="row mt-3">
                    <div class="col-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Noticias</h3>
        </div>
        <div class="card-body">
            <div id="noticias" class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="../Util/Img/logo2.png" class="img-fluid">
                                </div>
                                <div class="col-sm-12">
                                    <span class="text-muted float-left">Titulo</span><br>
                                    <span>Texto</span><br>
                                    <span>Fecha</span><br>
                                    <span>Usuario</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Layouts/general/footer.php';
?>
<script src="noticias.js"></script>