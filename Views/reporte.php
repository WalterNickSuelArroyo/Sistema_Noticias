<?php
include_once 'Layouts/general/header.php';
?>
<title>Home | Sistema RBP</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Reporte de recojo</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Reporte de Recojo</li>
        </ol>
      </div>
    </div>

    <div class="container-custom">
        <div class="container mx-auto">
            <!-- Contenido del contenedor secundario -->
            <!-- aca empieza el formulario-->

            <form  method="post" action="../Controllers/C_reporte.php">
	            <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="direccion" name="direccion" class="form-control" id="direccion" placeholder="calle o avenida de donde se solicita el recojo">
                </div>
                <div class="mb-3">
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="referencia" name="referencia" class="form-control" id="referencia" placeholder="referencias de la ubicacion">
                </div>
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso Aproximado</label>
                    <input type="peso" name="peso" class="form-control" id="peso" placeholder="peso aproximado del desecho">
                </div>
                <div class="mb-3">
                    <label for="contacto" class="form-label">Contacto</label>
                    <input type="contacto" name="contacto" class="form-control" id="contacto" placeholder="numero telefonico de quien solicita el desecho">
                </div>
                <div class="mb-3">
                    <label for="detalles" class="form-label">Detalles</label>
                    <textarea class="form-control" name="detalles" id="detalles" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Enviar Solicitud</button>
            </form>
    <!-- aca termina el formulario-->
        </div>
    </div>
    
  </div><!-- /.container-fluid -->
</section>


<section class="content">



</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Layouts/general/footer.php';
?>
<script src="reporte.js"></script>