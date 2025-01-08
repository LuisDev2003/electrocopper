<?php

require_once "../models/employee.php";

if (isset($_POST['operacion'])) {
  $employee = new Employee();

  switch ($_POST['operacion']) {
    case 'login': {
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }

        // Validar y sanitizar la entrada
        $correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
        $contraseña = $_POST['contraseña'];

        $response = ["estado" => false];

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
          $response["mensaje"] = "Correo no válido.";
        } else {
          $data = ["correo" => $correo];

          $result = $employee->login($data);

          if (!$result) {
            $_SESSION["estado"] = false;
            $response["mensaje"] = "El correo no existe.";
          } else if (password_verify($contraseña, $result["clave"])) {
            $_SESSION["estado"] = true;
            $_SESSION["empleado_id"] = $result["empleado_id"];
            $_SESSION["nombres"] = $result["nombres"];
            $_SESSION["apellidos"] = $result["apellidos"];
            $_SESSION["correo"] = $result["correo"];

            session_regenerate_id();

            $response["estado"] = true;
            $response["mensaje"] = "Acceso permitido.";
          } else {
            $response["mensaje"] = "La contraseña es incorrecta.";
          }
        }

        echo json_encode($response);

        break;
      }


    case "logout": {
        session_start();

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
          );
        }

        session_destroy();

        break;
      }


    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
