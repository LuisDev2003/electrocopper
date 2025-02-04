<?php

require_once 'conexion.php';
require_once "mail.php";

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

    $servicio = $data['servicio'];
    $fecha = $data['fecha'];
    $precio = $data['precio'];
    $nombre = $data['nombre'];
    $telefono = $data['telefono'];
    $correo = $data['correo'];
    $mensaje = $data['mensaje'];

    try {
      $consulta  = $this->conexion->prepare('CALL spu_formulario_presupuesto_registrar(?,?,?,?,?,?,?)');
      $consulta->execute([
        $servicio,
        $fecha,
        $precio,
        $nombre,
        $telefono,
        $correo,
        $mensaje,
      ]);

      $serviciosArray = explode(",", $servicio);

      $listaServicios = "<ul style='margin: 0; padding-left: 20px;'>";

      foreach ($serviciosArray as $item) {
        $listaServicios .= "<li>" . trim($item) . "</li>";
      }

      $listaServicios .= "</ul>";

      sendMail('Formulario de Presupuesto', "
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
            <tr>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Teléfono:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$telefono</td>
            </tr>
            <tr style='background-color: #f9f9f9;'>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Servicios:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$listaServicios</td>
            </tr>
            <tr style='background-color: #f9f9f9;'>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Fecha:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$fecha</td>
            </tr>
            <tr style='background-color: #f9f9f9;'>
              <td style='padding: 10px; border: 1px solid #ddd; font-weight: bold;'>Precio:</td>
              <td style='padding: 10px; border: 1px solid #ddd;'>$precio</td>
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
