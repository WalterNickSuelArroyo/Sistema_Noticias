<?php
include_once 'Conexion.php';
class Estado_Solicitud
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function read_all_solicitudes()
    {
        $sql = "SELECT u.nombres as id_usuario, z.nombre as id_zona, s.motivo, s.archivo, s.estado
                FROM solicitud s
                JOIN usuario u ON u.id = s.id_usuario
                JOIN zona z ON z.id = s.id_zona
                WHERE s.estado = 'A'";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function read_all_solicitudes_i()
    {
        $sql = "SELECT u.nombres as id_usuario, z.nombre as id_zona, s.motivo, s.archivo, s.estado
                FROM solicitud s
                JOIN usuario u ON u.id = s.id_usuario
                JOIN zona z ON z.id = s.id_zona
                WHERE s.estado = 'I'";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function obtener_solicitud($id)
    {
        $sql = "SELECT * 
                FROM solicitud
                WHERE solicitud.id=:id AND estado='A'";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id' => $id,
        );
        $query->execute($variables);
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
