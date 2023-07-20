<?php
include_once 'Conexion.php';
class Estado_Actividad_Trabajador
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function read_all_actividad_trabajador($id_usuario)
    {
        $sql = "SELECT a.id, a.hora_inicio, a.hora_final, u.nombres as id_usuario, z.nombre as id_zona, c.placa as id_camion,a.estado
            FROM actividad a
            JOIN usuario u ON u.id = a.id_usuario
            JOIN zona z ON z.id = a.id_zona
            JOIN camion c ON c.id = a.id_camion
            WHERE a.estado = 'A' AND a.id_usuario = :id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->bindParam(':id_usuario', $id_usuario);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function read_all_actividad_trabajador_i($id_usuario)
    {
        $sql = "SELECT a.id, a.hora_inicio, a.hora_final, u.nombres as id_usuario, z.nombre as id_zona, c.placa as id_camion,a.estado
            FROM actividad a
            JOIN usuario u ON u.id = a.id_usuario
            JOIN zona z ON z.id = a.id_zona
            JOIN camion c ON c.id = a.id_camion
            WHERE a.estado = 'I' AND a.id_usuario = :id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->bindParam(':id_usuario', $id_usuario);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function obtener_actividad($id)
    {
        $sql = "SELECT * 
                FROM actividad
                WHERE actividad.id=:id AND estado='A'";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id' => $id,
        );
        $query->execute($variables);
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function eliminar_actividad($id_actividad)
    {
        $sql = "UPDATE actividad SET estado=:estado WHERE id=:id_actividad";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id_actividad' => $id_actividad,
            ':estado' => 'I'
        );
        $query->execute($variables);
    }
}
