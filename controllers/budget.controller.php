<?php

require_once dirname(__DIR__) . "/models/budget.php";

if (isset($_POST['operacion'])) {
  $budget = new Budget();

  switch ($_POST['operacion']) {
    case 'get-all': {
        echo json_encode($budget->getAll());
        break;
      }

    case 'create': {
        $data = [
          'servicio' => implode(", ", $_POST['servicio']),
          'fecha'     => $_POST['fecha'],
          'precio'    => $_POST['precio'],
          'nombre'    => $_POST['nombre'],
          'telefono'  => $_POST['telefono'],
          'correo'    => $_POST['correo'],
          'mensaje'   => $_POST['mensaje'],
        ];

        echo json_encode($budget->create($data));
        break;
      }

    case 'delete': {
        $budgetId = $_POST['formulario_contacto_id'];

        echo json_encode($budget->delete($budgetId));
        break;
      }

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implementado";
  };
};
