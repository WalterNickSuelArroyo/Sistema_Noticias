<?php
include_once '../Models/Actividad.php';
include_once '../Util//Config/config.php';
$actividad = new Actividad();
session_start();
if ($_POST['funcion'] == 'read_all_actividades') {
    $actividad->read_all_actividades();
    $json = array();
    foreach ($actividad->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'hora_inicio' => $objeto->hora_inicio,
            'hora_final' => $objeto->hora_final,
            'estado' => $objeto->estado,
            'id_usuario' => $objeto->id_usuario, 
            'id_zona' => $objeto->id_zona, 
            'id_camion' => $objeto->id_camion,
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'editar_actividad') {
    $id_actividad = $_POST['id_actividad_mod'];
    $hora_inicio = $_POST['hora_inicio_mod'];
    $hora_final = $_POST['hora_final_mod'];
    $id_usuario = $_POST['id_usuario_mod'];
    $id_zona = $_POST['id_zona_mod'];
    $id_camion = $_POST['id_camion_mod'];
    $mensaje = '';
    $datos_cambiados = 'Ha hecho los siguientes cambios';
    $actividad->obtener_actividad($id_actividad);
    if ($hora_inicio != $actividad->objetos[0]->hora_inicio || $hora_final != $actividad->objetos[0]->hora_final || $id_usuario != $actividad->objetos[0]->id_usuario || $id_zona != $actividad->objetos[0]->id_zona || $id_camion != $actividad->objetos[0]->id_camion) {
        $actividad->editar($id_actividad, $hora_inicio, $hora_final, $id_usuario, $id_zona, $id_camion);
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
if ($_POST['funcion'] == 'eliminar_actividad') {
    $id_usuario = $_SESSION['id'];
    $id_actividad = $_POST['id'];
    $actividad->eliminar_actividad($id_actividad);
    $mensaje = 'success';
    $json = array(
        'mensaje' => $mensaje
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_actividad') {
    $hora_inicio = $_POST['hora_inicio'];
    $hora_final = $_POST['hora_final'];
    $id_usuario = $_POST['id_usuario'];
    $id_zona = $_POST['id_zona'];
    $id_camion = $_POST['id_camion'];
    $actividad->crear_actividad($hora_inicio,$hora_final,$id_usuario,$id_zona,$id_camion);
    echo 'success';
}
