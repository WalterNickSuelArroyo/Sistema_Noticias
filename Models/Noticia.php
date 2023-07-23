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
    function crear($fecha, $titulo, $id_user)
    {
        $sql = "INSERT INTO noticias(fecha,titulo,id_user)
                VALUES(:fecha,:titulo,:id_user)";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':fecha' => $fecha,
            ':titulo' => $titulo,
            ':id_user' => $id_user
        );
        $query->execute($variables);
    }
    function eliminar_noticia($id_noticia)
    {
        $sql = "UPDATE noticias SET estado=:estado WHERE id=:id_noticia";
        $query = $this->acceso->prepare($sql);
        $variables = array(
            ':id_noticia' => $id_noticia,
            ':estado'=>'I'
        );
        $query->execute($variables);
    }
}
