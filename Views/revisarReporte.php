<?php
include_once 'Layouts/general/header.php';
?>
<title>Home | Sistema RBP</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Solicitudes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Solicitudes</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
include_once '../Controllers/C_revisarReporte.php';
?>
<section class="content">

    <table class = "table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Direccion</th>
                <th scope="col">Peso aproximado</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato): ?>
                <tr>
                    <td><?php echo $dato['id_solicitud']; ?></td>
                    <td><?php echo $dato['direccion']; ?></td>
                    <td><?php echo $dato['peso_aprox']; ?></td>
                    <td><?php echo $dato['estado_solicitud']; ?></td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="atender(<?php echo $dato['id_solicitud']; ?>)">Atender</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        function atender(id) {
            // Lógica para atender el elemento con el ID especificado
            alert('Atendiendo el elemento con ID ' + id);
        }
    </script>

</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Layouts/general/footer.php';
?>
<script src="revisarReporte.js"></script>