<?php
include_once 'Conexion.php';
class SolicitudRecojo
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function crear_solicitud_recojo($id_usuario, $id_zona, $motivo, $archivo)
    {
        $sql = "INSERT INTO solicitud(id_usuario,id_zona,motivo,archivo) VALUES(:id_usuario,:id_zona,:motivo,:archivo)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario' => $id_usuario,':id_zona' => $id_zona, ':motivo' => $motivo, ':archivo' => $archivo));
    }
}
