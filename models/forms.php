<?php

require_once 'conexion.php';
require_once "mail.php";

class Forms extends Conexion
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }


  public function getAll()
  {
    try {
      $consulta = $this->conexion->prepare('CALL spu_formulario_contacto_listar()');
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data = [])
  {
    $nombre = $data['nombre'];
    $correo = $data['correo'];
    $mensaje = $data['mensaje'];

    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_contacto_registrar(?,?,?)');
      $consulta->execute(
        [$nombre, $correo, $mensaje]
      );

      sendMail('Formulario de Contacto', "
        <table style='width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 14px; border: 1px solid #ddd;'>
          <thead>
            <tr style='background-color: #555; color: white; text-align: left;'>
              <th style='padding: 10px; border: 1px solid #ddd; width: 180px;'>Campo</th>
              <th style='padding: 10px; border: 1px solid #ddd;'>Información</th>
            </tr>
          </thead>
          <tbody>
            <tr style='background-color: #f9f9f9;'>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Nombres y apellidos:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$nombre</td>
            </tr>
            <tr>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Correo electrónico:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$correo</td>
            </tr>
            <tr style='background-color: #f9f9f9;'>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Mensaje:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$mensaje</td>
            </tr>
          </tbody>
        </table>
      ");

      return ["success" => true];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update($data = [])
  {
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

  public function delete($data = [])
  {
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
