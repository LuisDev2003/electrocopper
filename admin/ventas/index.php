<?php
require_once "../layouts/permissions.php";

$pathImage = "../../images/logo.png";
$isDepth = true;
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel administrativo - Ventas</title>

    <link rel="shortcut icon" href="../../images/logo.png" type="image/png" />

    <link rel="stylesheet" href="../styles/index.css" />
  </head>

  <body>
    <?php require_once "../layouts/header.php" ?>

    <main class="main">
      <div class="wrapper-header">
        <h2 class="title">Ventas</h2>

        <a href="./registrar" class="button" style="display: inline-flex">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
          </svg>
        </a>
      </div>

      <div class="wrapper-table">
        <table id="tb-sales" class="table">
          <thead class="t-head">
            <tr class="t-row">
              <th>Empleado</th>
              <th>Fecha</th>
              <th class="actions">Acciones</th>
            </tr>
          </thead>

          <tbody class="t-body"></tbody>
        </table>
      </div>
    </main>
  </body>

  <script type="module" src="../scripts/index.js"></script>
  <script type="module" src="../scripts/sale.js"></script>
</html>