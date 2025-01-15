<?php

require_once "../admin/layouts/permissions.php";
require_once "../models/company.php";

if (isset($_POST['operacion'])) {
  $company = new Company();

  switch ($_POST['operacion']) {
    case 'get-all': {
        echo json_encode($company->getAll());
        break;
      }

    case 'get-by-id': {
        $data = [
          "empresa_id" => $_POST["empresa_id"]
        ];

        echo json_encode($company->getById($data));
        break;
      }

    case "create": {
        $data = [
          "ruc"           => $_POST["ruc"],
          "razon_social"  => $_POST["razon_social"],
          "correo"        => $_POST["correo"],
          "telefono"      => $_POST["telefono"],
          "direccion"     => $_POST["direccion"],
        ];

        echo json_encode($company->create($data));
        break;
      }


    case "update": {
        $data = [
          "empresa_id"  => $_POST['empresa_id'],
          "ruc"           => $_POST["ruc"],
          "razon_social"  => $_POST["razon_social"],
          "correo"        => $_POST["correo"],
          "telefono"      => $_POST["telefono"],
          "direccion"     => $_POST["direccion"],
        ];

        echo json_encode($company->update($data));
        break;
      }

    case "delete": {
        $data = [
          "empresa_id" => $_POST["empresa_id"]
        ];

        echo json_encode($company->delete($data));
        break;
      }

    default:
      $operacion = $_POST['operacion'];

      if ($operacion) echo "$operacion no implemendado";
      else echo "Operación vacía";
  }
}
