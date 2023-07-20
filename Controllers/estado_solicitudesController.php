<?php
include_once '../Models/Estado_Solicitud.php';
include_once '../Util//Config/config.php';
$estado_solicitud = new Estado_Solicitud();
session_start();
if ($_POST['funcion'] == 'read_all_solicitudes') {
    $estado_solicitud->read_all_solicitudes();
    $json = array();
    foreach ($estado_solicitud->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'id_zona' => $objeto->id_zona,
            'motivo' => $objeto->motivo, 
            'archivo' => $objeto->archivo, 
            'estado' => $objeto->estado
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'read_all_solicitudes_i') {
    $estado_solicitud->read_all_solicitudes_i();
    $json = array();
    foreach ($estado_solicitud->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'id_zona' => $objeto->id_zona,
            'motivo' => $objeto->motivo, 
            'archivo' => $objeto->archivo, 
            'estado' => $objeto->estado
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}