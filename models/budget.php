<?php

require_once 'conexion.php';

class Budget extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }


  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_formulario_presupuesto_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_presupuesto_registrar(?,?,?,?,?,?,?)');
      $consulta->execute([
        $data['servicio'],
        $data['fecha'],
        $data['precio'],
        $data['nombre'],
        $data['telefono'],
        $data['correo'],
        $data['mensaje'],
      ]);

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($formId)
  {
    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_presupuesto_eliminar(?)');
      $consulta->execute([
        $formId
      ]);

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
};
