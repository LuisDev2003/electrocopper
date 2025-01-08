<?php

session_start();

require_once "../models/employee.php";

if (isset($_POST['operacion'])) {
  $employee = new Employee();

  switch ($_POST['operacion']) {
    case 'login': {
        $data = [
          "correo"  => $_POST["correo"],
        ];

        $result = $employee->login($data);

        $response = [];
        $response["estado"] = false;

        if (!$result) {
          $_SESSION["estado"] = false;
          $response["mensaje"] = "El correo no existe";
        } else if (password_verify($_POST['contraseña'], $result["clave"])) {
          $_SESSION["estado"] = true;
          $response["estado"] = true;
          $response["mensaje"] = "Acceso";

          $_SESSION["empleado_id"] = $result["empleado_id"];
          $_SESSION["nombres"] = $result["nombres"];
          $_SESSION["apellidos"] = $result["apellidos"];
          $_SESSION["correo"] = $result["correo"];
          // $_SESSION["clave"] = password_hash("123456", PASSWORD_BCRYPT);
        } else {
          $response["mensaje"] = "La contraseña es incorrecta";
        }

        echo json_encode($response);
        break;
      }

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
