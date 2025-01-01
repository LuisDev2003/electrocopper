<?php

date_default_timezone_set('America/Lima');

require_once '../models/servicio.php';

if (isset($_POST['operacion'])) {
  $servicio = new Servicio();

  switch ($_POST['operacion']) {
    case 'get-all':
      echo json_encode($servicio->getAll());
      break;

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
