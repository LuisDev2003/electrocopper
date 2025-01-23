<?php

require_once '../models/review.php';

function sanitizeInput($input)
{
  $sanitized = htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
  return empty($sanitized) ? null : $sanitized;
}


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
        $nombre = sanitizeInput($_POST["nombre"]);
        $comentario = sanitizeInput($_POST["comentario"]);
        $estrellas = sanitizeInput($_POST["estrellas"]);
        $codigo = sanitizeInput($_POST["codigo"]);

        if (!$nombre || !$comentario || !$codigo) {
          echo json_encode([
            "error" => "empty_fields",
            "message" => "Todos los campos son obligatorios."
          ]);
        } else if (!is_numeric($estrellas) || $estrellas < 1 || $estrellas > 5) {
          echo json_encode([
            "error" => "invalid_stars",
            "message" => "El campo 'estrellas' debe ser un número entre 1 y 5."
          ]);
        } else {
          $code = $review->getCode()["valor"];

          if ($codigo !== $code) {
            echo json_encode([
              "error" => "invalid_code",
              "message" => "El código es incorrecto."
            ]);
          } else {
            $data = [
              "nombre"     => $nombre,
              "comentario" => $comentario,
              "estrellas"  => $estrellas,
              "codigo"     => $codigo,
            ];
            echo json_encode($review->create($data));
          }
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
