<?php

require_once 'Conexion.php';

class Forms extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }


  public function getAll(){
    try {
      $consulta = $this->conexion->prepare('CALL spu_formulario_contacto_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = []){
    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_contacto_registrar(?,?,?)');
      $consulta->execute(
        [
          $data['nombre'],
          $data['correo'],
          $data['mensaje']
        ]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update($data = []){
    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_contacto_actualizar(?,?,?,?)');
      $consulta->execute(
        [
          $data['formulario_contacto_id'],
          $data['nombre'],
          $data['correo'],
          $data['mensaje']
        ]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($data = []){
    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_contacto_eliminar(?)');
      $consulta->execute(
        [
          $data['formulario_contacto_id']
        ]
      );

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }



};


?>