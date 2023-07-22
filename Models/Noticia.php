<?php
include_once 'Conexion.php';
class Noticia
{
    private $acceso;

    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function llenar_noticias()
    {
        $sql = "SELECT n.id as id,
                       n.titulo as titulo,
                       n.imagen as imagen,
                       n.texto as texto,
                       n.fecha as fecha,
                       u.id as id_user,
                       u.nombres as nombres,
                       u.apellidos as apellidos
                FROM noticias n
                JOIN usuario u ON u.id=n.id_user
                AND n.estado='A'";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}