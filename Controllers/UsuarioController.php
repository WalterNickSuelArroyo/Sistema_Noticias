<?php
include_once '../Models/Usuario.php';
include_once '../Util/Config/config.php';
$usuario = new Usuario();
session_start();
if ($_POST['funcion'] == 'login') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $usuario->verificar_usuario($email);
    if ($usuario->objetos != null) {
        $pass_bd = openssl_decrypt($usuario->objetos[0]->pass, CODE, KEY);
        if ($pass_bd == $pass) {
                $_SESSION['id'] = $usuario->objetos[0]->id;
                $_SESSION['nombres'] = $usuario->objetos[0]->nombres;
                $_SESSION['tipo_usuario'] = $usuario->objetos[0]->id_tipo;
                $_SESSION['email'] = $usuario->objetos[0]->email;
            echo 'logueado';
        }
    }
}
if ($_POST['funcion'] == 'verificar_sesion') {
    if (!empty($_SESSION['id'])) {
        $json[] = array(
            'id' => $_SESSION['id'],
            'nombres'=>$_SESSION['nombres'],
            'tipo_usuario' => $_SESSION['tipo_usuario'],
            'email' => $_SESSION['email'],
        );
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    } else {
        echo '';
    }
}
if ($_POST['funcion'] == 'registrar_usuario') {
    $pass = openssl_encrypt($_POST['pass'], CODE, KEY);
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $usuario->registrar_usuario($pass, $nombres, $apellidos, $email, $telefono);
    echo 'success';
}
if ($_POST['funcion'] == 'obtener_datos') {
    $usuario->obtener_datos($_SESSION['id']);
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'nombres' => $objeto->nombres,
            'apellidos' => $objeto->apellidos,
            'direccion' => $objeto->direccion,
            'email' => $objeto->email,
            'telefono' => $objeto->telefono,
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'editar_datos') {
    $id_usuario = $_SESSION['id'];
    $nombres = $_POST['nombres_mod'];
    $apellidos = $_POST['apellidos_mod'];
    $direccion = $_POST['direccion_mod'];
    $email = $_POST['email_mod'];
    $telefono = $_POST['telefono_mod'];
    $usuario->obtener_datos($id_usuario);
    $datos_cambiados='ha echo los siguientes cambios: ';
    if ($nombres!=$usuario->objetos[0]->nombres||$apellidos!=$usuario->objetos[0]->apellidos||$direccion!=$usuario->objetos[0]->direccion||$email!=$usuario->objetos[0]->email||$telefono!=$usuario->objetos[0]->telefono) {
        $usuario->editar_datos($id_usuario, $nombres, $apellidos, $direccion, $email, $telefono);
        echo 'success';
    } else {
        echo 'danger';
    }
}
if ($_POST['funcion'] == 'cambiar_contra') {
    $email = $_SESSION['email'];
    $id_usuario = $_SESSION['id'];
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['pass_new'];
    $usuario->verificar_usuario($email);
    if (!empty($usuario->objetos)) {
        $pass_bd = openssl_decrypt($usuario->objetos[0]->pass, CODE, KEY);
        if ($pass_bd==$pass_old) {
            $pass_new_encriptada=openssl_encrypt($pass_new, CODE, KEY);
            $usuario->cambiar_contra($id_usuario, $pass_new_encriptada);
            echo 'success';
        }
        else {
            echo 'error';
        }  
    } else {
        echo 'error';
    }
}
if ($_POST['funcion'] == 'read_all_trabajadores') {
    $usuario->read_all_trabajadores();
    $json = array();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(

            'id' => openssl_encrypt($objeto->id, CODE, KEY),
            'user' => $objeto->user,
            'pass' => $objeto->pass,
            'nombres' => $objeto->nombres,
            'apellidos' => $objeto->apellidos,
            'dni' => $objeto->dni,
            'email' => $objeto->email,
            'telefono' => $objeto->telefono,
            'estado' => $objeto->estado
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'crear_trabajador') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $usuario->crear($user, $pass, $nombres, $apellidos, $dni, $email, $telefono);
    $json = array(
        'mensaje' => 'listo'
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'eliminar_trabajador') {
    $formateado = str_replace(" ", "+", $_POST['id']);
    $id_usuario = openssl_decrypt($formateado, CODE, KEY);
    $usuario->eliminar_trabajador($id_usuario);
    $mensaje='success';
    $json=array(
        'mensaje'=>$mensaje
    );
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion'] == 'tipo_usuario'){
    $tipo_usuario=$_SESSION['tipo_usuario'];
    echo $tipo_usuario;
}
if ($_POST['funcion'] == 'llenar_usuarios') {
    $usuario->llenar_usuarios();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'nombres' => $objeto->nombres,
            'apellidos' => $objeto->apellidos
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if ($_POST['funcion'] == 'llenar_usuarios_mod') {
    $usuario->llenar_usuarios_mod();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'nombres' => $objeto->nombres,
            'apellidos' => $objeto->apellidos
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}