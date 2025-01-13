<?php

require_once '../models/review.php';


if (isset($_POST['operacion'])) {
  $review = new Review();

  switch ($_POST['operacion']) {
    case 'update-code': {
        $data = [
          "codigo" => $_POST["codigo"]
        ];

        echo json_encode($review->updateCode($data));
        break;
      }

    case 'get-all': {
        echo json_encode($review->getAll());
        break;
      }

    case "create": {
        $data = [
          "nombre"      => htmlspecialchars($_POST["nombre"], ENT_QUOTES, 'UTF-8'),
          "comentario"  => htmlspecialchars($_POST["comentario"], ENT_QUOTES, 'UTF-8'),
          "codigo"      => htmlspecialchars($_POST["codigo"], ENT_QUOTES, 'UTF-8'),
        ];

        $code = $review->getCode()["valor"];

        if ($data['codigo'] !== $code) {
          echo json_encode([
            "error" => "code",
            "message" => "El código es incorrecto."
          ]);
        } else {
          echo json_encode($review->create($data));
        }

        break;
      }

    case "delete": {
        $review_id = $_POST["review_id"];

        echo json_encode($review->delete($review_id));

        break;
      }

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
