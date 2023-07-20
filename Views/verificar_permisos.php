<?php
$carpeta = '../Util/Img/solicitudes/';

if (file_exists($carpeta)) {
    if (is_writable($carpeta)) {
        echo "La carpeta tiene permisos de escritura";
    } else {
        echo "La carpeta no tiene permisos de escritura";
    }
} else {
    echo "La carpeta no existe";
}
?>
