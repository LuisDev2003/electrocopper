<?php

require_once 'conexion.php';

class Category extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_categoria_listar');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


}

?>