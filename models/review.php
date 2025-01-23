<?php

require_once 'conexion.php';

class Review extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function getCode()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_codigo_obtener()');
      $consulta->execute();

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function updateCode($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_codigo_actualizar(?)');
      $consulta->execute(
        [$data["codigo"]]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_comentario_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_comentario_registrar(?,?,?)');
      $consulta->execute(
        array(
          $data['nombre'],
          $data['comentario'],
          $data['estrellas'],
        )
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_comentario_eliminar(?)');
      $consulta->execute(
        array($id)
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
