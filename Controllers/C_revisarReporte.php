<?php
include '../Models/Guardar_solicitud.php';

$modelo = new Modelo('localhost','root','','sistemarbp');

$datos = $modelo->obtenerDatos();

?>