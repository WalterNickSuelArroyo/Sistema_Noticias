<?php
include_once '../Models/Camion.php';
include_once '../Util//Config/config.php';
$camion = new Camion();
session_start();
if ($_POST['funcion'] == 'read_all_camiones') {
    $camion->read_all_camiones();
    $json = array();
    foreach ($camion->objetos as $objeto) {
        $json[] = array(

            'id' => openssl_encrypt($objeto->id, CODE, KEY),
            'placa' => $objeto->placa,
            'marca' => $objeto->marca,
            'estado' => $objeto->estado
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_camion') {
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $camion->crear($placa, $marca);
    $json = array(
        'mensaje' => 'listo'
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'eliminar_camion') {
    $id_usuario=$_SESSION['id'];
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_camion = openssl_decrypt($formateado, CODE, KEY);
    $camion->eliminar_camion($id_camion);
    $mensaje='success';
    $json=array(
        'mensaje'=>$mensaje
    );
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'llenar_camiones') {
    $camion->llenar_camiones();
    foreach ($camion->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'placa' => $objeto->placa,
            'marca' => $objeto->marca
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'llenar_camiones_mod') {
    $camion->llenar_camiones_mod();
    foreach ($camion->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'placa' => $objeto->placa,
            'marca' => $objeto->marca
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}