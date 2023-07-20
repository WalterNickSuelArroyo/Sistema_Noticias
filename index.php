<?php
include_once 'Views/Layouts/header.php';
?>
<title>Home | Sistema RBP</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Home</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<style>
  .titulo_producto {
    color: #000;
  }

  .titulo_producto:visited {
    color: #000;
  }

  .titulo_producto:focus {
    border-bottom: 1px solid;
  }

  .titulo_producto:hover {
    border-bottom: 1px solid;
  }

  .titulo_producto:active {
    background: #000;
    color: #fff;

  }
</style>

<section class="content">
  <div class="card">
    <div class="card-body">
      <img src="Util/Img/indexRecojo.png" alt="" class="d-block mx-auto" width="900px">
    </div>
  </div>
</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Views/Layouts/footer.php';
?>
<script src="index.js"></script>