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
      $consulta = $this->conexion->prepare('CALL spu_categoria_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_cateoria_registrar(?)");
      $consulta->execute(
        [
          $data['nombre']
        ]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  
  }


  public function update($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_categoria_actualizar(?, ?)');
      $consulta->execute(
        [
          $data['categoria_id'],
          $data['nombre']
        ]
        );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_categoria_eliminar(?)');
      $consulta->execute(
        [
          $data['categoria_id']
        ]
      );

      return ["success"=> true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}

?>