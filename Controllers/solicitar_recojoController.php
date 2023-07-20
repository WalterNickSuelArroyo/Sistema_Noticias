<?php
include_once '../Models/Solicitar_Recojo.php';
include_once '../Util//Config/config.php';
$solicitud_recojo = new SolicitudRecojo();
session_start();
if ($_POST['funcion'] == 'crear_solicitud_recojo') {
    $id_usuario = $_SESSION['id'];
    $id_zona = $_POST['id_zona'];
    $motivo = $_POST['motivo'];
    $archivo = $_POST['archivo'];
    /*$archivo = $_FILES['archivo']['name'];
    $nombre_imagen = uniqid().'-'.$archivo;
    $ruta='../Util/Img/solicitudes/'.$nombre_imagen;
    move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);*/
    $solicitud_recojo->crear_solicitud_recojo($id_usuario, $id_zona, $motivo, $archivo);
    echo 'success';
}