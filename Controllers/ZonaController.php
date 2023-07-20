<?php
include_once '../Models/Zona.php';
include_once '../Util//Config/config.php';
$zona = new Zona();
session_start();
if ($_POST['funcion'] == 'read_all_zonas') {
    $zona->read_all_zonas();
    $json = array();
    foreach ($zona->objetos as $objeto) {
        $json[] = array(

            'id' => openssl_encrypt($objeto->id, CODE, KEY),
            'nombre' => $objeto->nombre,
            'tipo' => $objeto->tipo,
            'estado' => $objeto->estado,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_zona') {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $zona->crear($nombre, $tipo);
    $json = array(
        'mensaje' => 'listo'
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'editar_zona') {
    $formateado = str_replace(" ", "+", $_POST['id_zona_mod']);
    $id_zona = openssl_decrypt($formateado, CODE, KEY);
    $nombre = $_POST['nombre_mod'];
    $tipo = $_POST['tipo_mod'];
    $mensaje = '';
    $datos_cambiados = 'Ha hecho los siguientes cambios';
    $zona->obtener_zona($id_zona);
    if ($nombre != $zona->objetos[0]->nombre || $tipo != $zona->objetos[0]->tipo) {
        if ($nombre != $zona->objetos[0]->nombre) {
            $datos_cambiados .= 'Una zona cambio su nombre de ' . $zona->objetos[0]->nombre . ' a ' . $nombre . ', ';
        }
        if ($tipo != $zona->objetos[0]->tipo) {
            $datos_cambiados .= 'Una zona cambio su tipo de ' . $zona->objetos[0]->tipo . ' a ' . $tipo . ', ';
        }
        $zona->editar($id_zona, $nombre, $tipo);
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
if ($_POST['funcion'] == 'eliminar_zona') {
    $id_usuario = $_SESSION['id'];
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_zona = openssl_decrypt($formateado, CODE, KEY);
    $zona->eliminar_zona($id_zona);
    $mensaje = 'success';
    $json = array(
        'mensaje' => $mensaje
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'llenar_zonas') {
    $zona->llenar_zonas();
    foreach ($zona->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'nombre' => $objeto->nombre,
            'tipo' => $objeto->tipo,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'llenar_zonas_mod') {
    $zona->llenar_zonas_mod();
    foreach ($zona->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'nombre' => $objeto->nombre,
            'tipo' => $objeto->tipo,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
