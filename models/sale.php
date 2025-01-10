<?php

require_once 'conexion.php';

class Sale extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_venta_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getAllWithDetail()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_venta_detalle_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getById($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_venta_buscar(?)');
      $consulta->execute([$data["venta_id"]]);

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getByIdWithDetail($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_venta_detalle_buscar(?)');
      $consulta->execute([$data["venta_id"]]);

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_venta_registrar(?,?)');
      $consulta->execute([$data["empleado_id"], $data["fecha"]]);

      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function createDetail($data = [])
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_detalle_venta_registrar(?,?)');
      $consulta->execute([$data["venta_id"], $data["servicio_id"]]);

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
