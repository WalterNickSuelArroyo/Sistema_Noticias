<?php
include_once '../Models/Noticia.php';
include_once '../Util//Config/config.php';
$noticia = new Noticia();
session_start();
if ($_POST['funcion'] == 'llenar_noticias') {
    $noticia->llenar_noticias();
    $json=array();
    foreach ($noticia->objetos as $objeto) {
        $json[]=array(
            'id' => openssl_encrypt($objeto->id, CODE, KEY),
            'titulo'=>$objeto->titulo,
            'imagen'=>$objeto->imagen,
            'texto'=>$objeto->texto,
            'fecha'=>$objeto->fecha,
            'id_user'=>$objeto->id_user,
            'nombres'=>$objeto->nombres,
            'apellidos'=>$objeto->apellidos,
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_noticia') {
    $fecha = $_POST['fecha'];
    $titulo = $_POST['titulo'];
    $id_user = $_SESSION['id'];
    $noticia->crear($fecha, $titulo,$id_user);
    $json = array(
        'mensaje' => 'listo'
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'eliminar_noticia') {
    $id_usuario = $_SESSION['id'];
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_noticia = openssl_decrypt($formateado, CODE, KEY);
    $noticia->eliminar_noticia($id_noticia);
    $mensaje = 'success';
    $json = array(
        'mensaje' => $mensaje
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

