<?php

class Modelo {
    private $conexion;
    
    public function __construct($servidor, $usuario, $contrasena, $basedatos) {
      $this->conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
      
      if (!$this->conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
      }
    }

    public function guardarDatos($direccion, $referencia, $peso, $contacto, $detalles) {
        $consulta = "INSERT INTO solicitudes_recojo (direccion, referencia,peso_aprox,contacto,detalles) VALUES ('$direccion', '$referencia','$peso','$contacto','$detalles')";
        $resultado = mysqli_query($this->conexion, $consulta);
        
        if (!$resultado) {
          return false;
        } else {
          // Mostrar un mensaje de éxito si la consulta se ejecuta correctamente
          
          return true;
          
        }
    }

    public function obtenerDatos() {
      $consulta = "SELECT * FROM solicitudes_recojo";
      $resultado = mysqli_query($this->conexion, $consulta);

      $datos = array();
      while ($fila = mysqli_fetch_assoc($resultado)) {
          $datos[] = $fila;
      }
      
      return $datos;
    }

}
?>