<?php
include_once '../Models/Noticia.php';
$noticia = new Noticia();
session_start();
if ($_POST['funcion'] == 'llenar_noticias') {
    $noticia->llenar_noticias();
    //var_dump($noticia);
    $json=array();
    foreach ($noticia->objetos as $objeto) {
        $json[]=array(
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
