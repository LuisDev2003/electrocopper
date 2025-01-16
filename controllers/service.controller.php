<?php

date_default_timezone_set('Europe/Madrid');

require_once '../models/service.php';

if (isset($_POST['operacion'])) {
  $servicio = new Servicio();

  switch ($_POST['operacion']) {
    case 'get-all':
      echo json_encode($servicio->getAll());
      break;

    case 'get-by-id': {
        $data = [
          "servicio_id" => $_POST['servicio_id']
        ];

        echo json_encode($servicio->getById($data));
        break;
      }

    case "create": {
        $data = [
          'nombre' => $_POST['nombre'],
          'categoria_id'=> $_POST['categoria_id'],
          'descripcion' => $_POST['descripcion'] ?? "",
          'precio' => $_POST['precio'] ?? 0,
          'imagen' => "",
        ];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
          $allowedExtensions = ['jpg', 'jpeg', 'png'];
          $uploadDir = "../images/services/";

          $fileName = $_FILES['imagen']['name'];
          $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
          $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

          if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode(['error' => 'format', 'message' => 'Formato de imagen no permitido']);
            exit;
          }

          // Crear directorio si no existe
          if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
          }

          $path = $uploadDir . $newFileName;

          if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
            $data['imagen'] = $newFileName;
          } else {
            echo json_encode(['error' => 'upload', 'message' => 'Error al mover la imagen al destino']);
            exit;
          }
        }

        echo json_encode($servicio->create($data));
        break;
      }

    case "update": {
        $data = [
          'servicio_id' => $_POST['servicio_id'],
          'categoria_id'=> $_POST['categoria_id'],
          'nombre' => $_POST['nombre'],
          'descripcion' => $_POST['descripcion'] ?? "",
          'precio' => $_POST['precio'] ?? 0,
          'imagen' => "",
        ];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
          $allowedExtensions = ['jpg', 'jpeg', 'png'];
          $uploadDir = "../images/services/";

          $fileName = $_FILES['imagen']['name'];
          $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
          $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

          if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode(['error' => 'format', 'message' => 'Formato de imagen no permitido']);
            exit;
          }

          // Crear directorio si no existe
          if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
          }

          $path = $uploadDir . $newFileName;

          if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
            $data['imagen'] = $newFileName;
          } else {
            echo json_encode(['error' => 'upload', 'message' => 'Error al mover la imagen al destino']);
            exit;
          }
        }

        echo json_encode($servicio->update($data));
        break;
      }

    case "delete": {
        $servicio_id = $_POST["servicio_id"];

        echo json_encode($servicio->delete($servicio_id));

        break;
      }

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
