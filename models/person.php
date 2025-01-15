<?php

require_once 'conexion.php';

class Person extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_persona_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getById($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_persona_buscar(?)');
      $consulta->execute([$data["persona_id"]]);

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_persona_registrar(?,?)');
      $consulta->execute(
        [
          $data['nombres'],
          $data['apellidos']
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
      $consulta = $this->conexion->prepare('CALL spu_persona_actualizar(?,?,?)');
      $consulta->execute(
        [
          $data['persona_id'],
          $data['nombres'],
          $data['apellidos'],
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
      $consulta = $this->conexion->prepare('CALL spu_persona_eliminar(?)');
      $consulta->execute(
        [$data["persona_id"]]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
