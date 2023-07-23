<?php
include_once '../Models/AdminCitas.php';
include_once '../Util//Config/config.php';
$admincita = new AdminCitas();
session_start();
if ($_POST['funcion'] == 'read_all_citas') {
    $admincita->read_all_citas();
    $json = array();
    foreach ($admincita->objetos as $objeto) {
        $json[] = array(
            'id' => openssl_encrypt($objeto->id, CODE, KEY),
            'id_user' => $objeto->id_user,
            'fecha' => $objeto->fecha,
            'motivo' => $objeto->motivo,
            'nombres' => $objeto->nombres,
            'apellidos' => $objeto->apellidos,
            'estado' => $objeto->estado,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_cita') {
    $id_user = $_POST['id_user'];
    $fecha = $_POST['fecha'];
    $motivo = $_POST['motivo'];
    $admincita->crear($fecha, $motivo,$id_user);
    echo 'success';
}
if ($_POST['funcion'] == 'eliminar_cita') {
    $id_usuario = $_SESSION['id'];
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_cita = openssl_decrypt($formateado, CODE, KEY);
    $admincita->eliminar_cita($id_cita);
    $mensaje = 'success';
    $json = array(
        'mensaje' => $mensaje
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'llenar_citas') {
    $cita->llenar_citas();
    foreach ($cita->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'nombre' => $objeto->nombre,
            'tipo' => $objeto->tipo,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}