<?php

require_once "../admin/layouts/permissions.php";
require_once "../models/sale.php";

if (isset($_POST['operacion'])) {
  $sale = new Sale();

  switch ($_POST['operacion']) {
    case 'get-all': {
        echo json_encode($sale->getAll());
        break;
      }

    case 'get-all-with-detail': {
        echo json_encode($sale->getAllWithDetail());
        break;
      }

    case 'get-by-id': {
        $data = [
          "empleado_id" => $_POST["empleado_id"]
        ];

        echo json_encode($sale->getById($data));
        break;
      }

    case "create": {
        // Datos para la venta principal
        $saleData = [
          "empleado_id" => $_SESSION["empleado_id"],
          "fecha" => $_POST["fecha"] ?? (new DateTime("now", new DateTimeZone("Europe/Madrid")))->format("Y-m-d H:i:s")
        ];

        // Crear la venta principal y obtener el ID generado
        $saleIdResult = $sale->create($saleData);
        $ventaId = $saleIdResult['venta_id']; // ID de la venta creada

        // Decodificar el JSON de detalles
        $detalleArray = json_decode($_POST["detalle"], true);

        if (is_array($detalleArray)) {
          foreach ($detalleArray as $detalle) {
            // Datos para cada detalle
            $detalleData = [
              "venta_id" => $ventaId,
              "servicio_id" => $detalle["servicio_id"]
            ];
            $sale->createDetail($detalleData);
          }

          // Respuesta exitosa
          echo json_encode(["success" => true]);
        } else {
          // Respuesta en caso de error al decodificar el JSON
          echo json_encode([
            "success" => false,
            "message" => "Formato de detalle inválido"
          ]);
        }

        break;
      }

    default:
      $operacion = $_POST['operacion'];
      echo "$operacion no implemendado";
  }
}
