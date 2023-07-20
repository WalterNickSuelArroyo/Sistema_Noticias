<?php
include_once '../Models/Estado_Actividad.php';
include_once '../Util//Config/config.php';
$estado_actividad = new Estado_Actividad();
session_start();
if ($_POST['funcion'] == 'read_all_actividades') {
    $estado_actividad->read_all_actividades();
    $json = array();
    foreach ($estado_actividad->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'hora_inicio' => $objeto->hora_inicio,
            'hora_final' => $objeto->hora_final,
            'id_usuario' => $objeto->id_usuario, 
            'id_zona' => $objeto->id_zona, 
            'id_camion' => $objeto->id_camion,
            'estado' => $objeto->estado
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'read_all_actividades_i') {
    $estado_actividad->read_all_actividades_i();
    $json = array();
    foreach ($estado_actividad->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'hora_inicio' => $objeto->hora_inicio,
            'hora_final' => $objeto->hora_final,
            'id_usuario' => $objeto->id_usuario, 
            'id_zona' => $objeto->id_zona, 
            'id_camion' => $objeto->id_camion,
            'estado' => $objeto->estado
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'eliminar_actividad') {
    $id_usuario=$_SESSION['id'];
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_actividad = openssl_decrypt($formateado, CODE, KEY);
    $estado_actividad->eliminar_actividad($id_actividad);
    $mensaje='success';
    $json=array(
        'mensaje'=>$mensaje
    );
    $jsonstring=json_encode($json);
    echo $jsonstring;
}