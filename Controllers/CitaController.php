<?php
include_once '../Models/Cita.php';
include_once '../Util//Config/config.php';
$cita = new Cita();
session_start();
if ($_POST['funcion'] == 'read_all_citas') {
    $cita->read_all_citas();
    $json = array();
    foreach ($cita->objetos as $objeto) {
        $json[] = array(
            'id' => openssl_encrypt($objeto->id, CODE, KEY),
            'id_user' => $objeto->id_user,
            'fecha' => $objeto->fecha,
            'motivo' => $objeto->motivo,
            'estado' => $objeto->estado,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_cita') {
    $fecha = $_POST['fecha'];
    $motivo = $_POST['motivo'];
    $id_user = $_SESSION['id'];
    $cita->crear($fecha, $motivo,$id_user);
    $json = array(
        'mensaje' => 'listo'
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'editar_cita') {
    $formateado = str_replace(" ", "+", $_POST['id_cita_mod']);
    $id_cita = openssl_decrypt($formateado, CODE, KEY);
    $fecha = $_POST['fecha_mod'];
    $motivo = $_POST['motivo_mod'];
    $mensaje = '';
    $datos_cambiados = 'Ha hecho los siguientes cambios';
    $cita->obtener_cita($id_cita);
    if ($fecha != $cita->objetos[0]->fecha || $motivo != $cita->objetos[0]->motivo) {
        $cita->editar($id_cita, $fecha, $motivo);
        $mensaje = 'success';
    } else {
        $mensaje = 'danger';
    }
    $json = array(
        'mensaje' => $mensaje
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'eliminar_cita') {
    $id_usuario = $_SESSION['id'];
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_cita = openssl_decrypt($formateado, CODE, KEY);
    $cita->eliminar_cita($id_cita);
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
if ($_POST['funcion'] == 'llenar_citas_mod') {
    $cita->llenar_citas_mod();
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
