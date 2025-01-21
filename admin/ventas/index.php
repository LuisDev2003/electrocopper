<?php
require_once "../layouts/permissions.php";

$currentDepth = 1;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel administrativo - Ventas</title>

  <?php require_once "../layouts/meta.php"; ?>

  <link rel="stylesheet" href="../../styles/output.css" />
</head>

<body>
  <?php require_once "../layouts/header.php" ?>

  <main>
    <div class="flex justify-between items-center mb-3">
      <h2 class="text-2xl font-bold">Ventas</h2>

      <a href="./registrar" class="bg-neutral-800 text-white p-2 rounded-xl cursor-pointer">
        <svg
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="size-6 stroke-2">
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
