<?php

require_once '../Models/Guardar_solicitud.php';

$modelo = new Modelo('localhost','root','','sistemarbp');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $direccion = $_POST['direccion'];
    $referencia = $_POST['referencia'];
    $peso = $_POST['peso'];
    $contacto = $_POST['contacto'];
    $detalles = $_POST['detalles'];
    
    $resultado = $modelo->guardarDatos($direccion, $referencia, $peso, $contacto, $detalles);
    // Código para redirigir al usuario a otra página o mostrar un mensaje de éxito
    
    include  "../Views/reporte.php";

  }
?>

<script>
  alert("Los datos se han guardado correctamente")
  location.href = "../Views/reporte.php"
</script>