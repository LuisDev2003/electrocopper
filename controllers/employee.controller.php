<?php

require_once "../admin/layouts/permissions.php";

require_once "../models/employee.php";

if (isset($_POST['operacion'])) {
  $employee = new Employee();

  switch ($_POST['operacion']) {
    case 'get-all': {
        echo json_encode($employee->getAll());
        break;
      }

    case 'get-by-id': {
        $data = [
          "empleado_id" => $_POST["empleado_id"]
        ];

        echo json_encode($employee->getById($data));
        break;
      }

    case "create": {
        $data = [
          'nombres'  => $_POST['nombres'],
          'apellidos' => $_POST['apellidos'],
          'correo' => $_POST['correo'],
        ];

        echo json_encode($employee->create($data));
        break;
      }


    case "update": {
        $data = [
          "empleado_id" => $_POST['empleado_id'],
          'nombres'  => $_POST['nombres'],
          'apellidos' => $_POST['apellidos'],
          'correo' => $_POST['correo'],
        ];

        echo json_encode($employee->update($data));
        break;
      }

    case "delete": {
        $data = [
          "empleado_id" => $_POST["empleado_id"]
        ];

        echo json_encode($employee->delete($data));

        break;
      }

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
