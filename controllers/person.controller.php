<?php

require_once "../admin/layouts/permissions.php";
require_once "../models/person.php";

if (isset($_POST['operacion'])) {
  $person = new Person();

  switch ($_POST['operacion']) {
    case 'get-all': {
        echo json_encode($person->getAll());
        break;
      }

    case 'get-by-id': {
        $data = [
          "persona_id" => $_POST["persona_id"]
        ];

        echo json_encode($person->getById($data));
        break;
      }

    case "create": {
        $data = [
          'nombres'   => $_POST['nombres'],
          'apellidos' => $_POST['apellidos'],
        ];

        echo json_encode($person->create($data));
        break;
      }


    case "update": {
        $data = [
          "persona_id"  => $_POST['persona_id'],
          'nombres'     => $_POST['nombres'],
          'apellidos'   => $_POST['apellidos'],
        ];

        echo json_encode($person->update($data));
        break;
      }

    case "delete": {
        $data = [
          "persona_id" => $_POST["persona_id"]
        ];

        echo json_encode($person->delete($data));
        break;
      }

    default:
      $operacion = $_POST['operacion'];

      if ($operacion) echo "$operacion no implemendado";
      else echo "Operación vacía";
  }
}
