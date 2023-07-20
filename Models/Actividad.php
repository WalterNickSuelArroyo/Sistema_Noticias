<?php
include_once 'Conexion.php';
class Actividad
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function read_all_actividades()
{
    $sql = "SELECT a.id, a.hora_inicio, a.hora_final, u.nombres as id_usuario, z.nombre as id_zona, c.placa as id_camion,a.estado
            FROM actividad a
            JOIN usuario u ON u.id = a.id_usuario
            JOIN zona z ON z.id = a.id_zona
            JOIN camion c ON c.id = a.id_camion
            WHERE a.estado = 'A'";
    $query = $this->acceso->prepare($sql);
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
    function editar($id_actividad, $hora_inicio, $hora_final, $id_usuario,$id_zona,$id_camion)
    {
        if ($hora_inicio != '' || $hora_final != '' || $id_usuario != '' || $id_zona != '' || $id_camion != '') {
            $sql = "UPDATE actividad SET hora_inicio=:hora_inicio, hora_final=:hora_final, id_usuario=:id_usuario, id_zona=:id_zona, id_camion=:id_camion WHERE id=:id_actividad";
            $query = $this->acceso->prepare($sql);
            $variables = array(
                ':hora_inicio' => $hora_inicio,
                ':hora_final' => $hora_final,
                ':id_usuario' => $id_usuario,
                ':id_zona' => $id_zona,
                ':id_camion' => $id_camion,
                ':id_actividad' => $id_actividad
            );
            $query->execute($variables);
        }
    }
    function eliminar_actividad($id_actividad)
    {
        $sql = "UPDATE actividad SET estado=:estado WHERE id=:id_actividad";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id_actividad' => $id_actividad,
            ':estado'=>'I'
        );
        $query->execute($variables);
    }
    function crear_actividad($hora_inicio,$hora_final,$id_usuario,$id_zona,$id_camion)
    {
        $sql = "INSERT INTO actividad(hora_inicio,hora_final,id_usuario,id_zona,id_camion) VALUES(:hora_inicio,:hora_final,:id_usuario,:id_zona,:id_camion)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':hora_inicio' => $hora_inicio, ':hora_final' => $hora_final, ':id_usuario' => $id_usuario, ':id_zona' => $id_zona, ':id_camion' => $id_camion));
    }
}
