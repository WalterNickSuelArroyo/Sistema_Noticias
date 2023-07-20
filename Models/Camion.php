<?php
include_once 'Conexion.php';
class Camion
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function read_all_camiones()
    {
        $sql = "SELECT * 
                FROM camion
                WHERE estado='A'";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function crear($placa, $marca)
    {
        $sql = "INSERT INTO camion(placa, marca)
                VALUES(:placa,:marca)";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':placa' => $placa,
            ':marca' => $marca,
        );
        $query->execute($variables);
    }
    function obtener_camion($id)
    {
        $sql = "SELECT * 
                FROM camion
                WHERE camion.id=:id AND estado='A'";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id' => $id,
        );
        $query->execute($variables);
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function eliminar_camion($id_camion)
    {
        $sql = "UPDATE camion SET estado=:estado WHERE id=:id_camion";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id_camion' => $id_camion,
            ':estado'=>'I'
        );
        $query->execute($variables);
    }
    function llenar_camiones()
    {
        $sql = "SELECT * 
                FROM camion";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function llenar_camiones_mod()
    {
        $sql = "SELECT * 
                FROM camion";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}