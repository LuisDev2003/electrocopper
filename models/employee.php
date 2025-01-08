<?php

require_once 'conexion.php';

class Employee extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function login($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_iniciar_sesion(?)');
      $consulta->execute([$data["correo"]]);

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_empleado_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_empleado_registrar(?,?,?,?)');
      $consulta->execute(
        [
          $data['nombres'],
          $data['apellidos'],
          $data['correo'],
          $data['clave'],
        ]
      );

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_empleado_actualizar(?,?,?,?,?)');
      $consulta->execute(
        [
          $data['empleado_id'],
          $data['nombres'],
          $data['apellidos'],
          $data['correo'],
          $data['clave'],
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
      $consulta = $this->conexion->prepare('CALL spu_empleado_eliminar(?)');
      $consulta->execute(
        [$data["empleado_id"]]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
