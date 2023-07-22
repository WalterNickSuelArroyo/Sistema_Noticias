<?php
include_once 'Conexion.php';
class Cita
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function read_all_citas()
    {
        $sql = "SELECT * 
                FROM citas
                WHERE estado='A'";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function crear($fecha, $motivo, $id_user)
    {
        $sql = "INSERT INTO citas(fecha,motivo,id_user)
                VALUES(:fecha,:motivo,:id_user)";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':fecha' => $fecha,
            ':motivo' => $motivo,
            ':id_user' => $id_user
        );
        $query->execute($variables);
    }
    function obtener_cita($id)
    {
        $sql = "SELECT * 
                FROM citas
                WHERE citas.id=:id AND estado='A'";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id' => $id,
        );
        $query->execute($variables);
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function editar($id_cita, $fecha, $motivo)
    {
        if ($fecha != '' || $motivo != '') {
            $sql = "UPDATE citas SET fecha=:fecha, motivo=:motivo WHERE id=:id_cita";
            $query = $this->acceso->prepare($sql);
            $variables = array(
                ':fecha' => $fecha,
                ':motivo' => $motivo,
                ':id_cita' => $id_cita
            );
            $query->execute($variables);
        }
    }
    function eliminar_cita($id_cita)
    {
        $sql = "UPDATE citas SET estado=:estado WHERE id=:id_cita";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id_cita' => $id_cita,
            ':estado'=>'I'
        );
        $query->execute($variables);
    }
    function llenar_citas()
    {
        $sql = "SELECT * 
                FROM citas";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function llenar_citas_mod()
    {
        $sql = "SELECT * 
                FROM citas";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
