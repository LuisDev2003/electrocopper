<?php

require_once '../models/review.php';

if (isset($_POST['operacion'])) {
  $review = new Review();

  switch ($_POST['operacion']) {
    case 'get-all': {
        echo json_encode($review->getAll());
        break;
      }

    case "create": {
        $data = [
          "nombre"  => $_POST["nombre"],
          "comentario"      => $_POST["comentario"],
        ];

        echo json_encode($review->create($data));
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
