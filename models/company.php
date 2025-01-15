<?php

require_once 'conexion.php';

class Company extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_empresa_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getById($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_empresa_buscar(?)');
      $consulta->execute([$data["empresa_id"]]);

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_empresa_registrar(?,?,?,?,?)');
      $consulta->execute(
        [
          $data['ruc'],
          $data['razon_social'],
          $data['correo'],
          $data['telefono'],
          $data['direccion'],
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
      $consulta = $this->conexion->prepare('CALL spu_empresa_actualizar(?,?,?,?,?,?)');
      $consulta->execute(
        [
          $data['empresa_id'],
          $data['ruc'],
          $data['razon_social'],
          $data['correo'],
          $data['telefono'],
          $data['direccion'],
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
      $consulta = $this->conexion->prepare('CALL spu_empresa_eliminar(?)');
      $consulta->execute(
        [$data["empresa_id"]]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
