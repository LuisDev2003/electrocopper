<?php
require_once "../layouts/permissions.php";

$currentDepth = 1;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel administrativo - Registrar Venta</title>

  <?php require_once "../layouts/meta.php"; ?>

  <link rel="stylesheet" href="../../styles/output.css" />

  <style>
    #toggle-select-service:has(.close) {
      .open {
        display: none;
      }

      .close {
        display: block;
      }
    }

    #toggle-select-service:not(.close) {
      .open {
        display: block;
      }

      .close {
        display: none;
      }
    }

    #select-service {
      display: none;
      position: absolute;
      top: 48px;
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      background: white;
      box-shadow: 2px 2px 12px #c6c2c2;
    }

    .option {
      cursor: pointer;
      display: block;
      width: 100%;
      padding: 12px;
      text-align: start;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      background-color: transparent;
    }

    .option.service:hover {
      background-color: var(--gray);
      border-radius: 8px;
      color: white;
    }
  </style>
</head>

<body>
  <?php require_once "../layouts/header.php" ?>

  <main>
    <div class="flex justify-between items-center mb-3">
      <h2 class="text-2xl font-bold">Registrar Venta</h2>

      <div class="search relative flex items-center gap-x-2 w-full max-w-80 grow shrink-0 basis-50">
        <button id="toggle-select-service" type="button" class="button close cursor-pointer">
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
            class="open">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path
              d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
          </svg>

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
            class="close">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4" />
            <path d="M3 15l2.5 -3.8" />
            <path d="M21 14.976l-2.492 -3.776" />
            <path d="M9 17l.5 -4" />
            <path d="M15 17l-.5 -4" />
          </svg>
        </button>

        <input
          id="input-service"
          type="text"
          placeholder="Buscar servicio"
          class="w-full outline-none py-2.5 px-3 rounded-lg border border-neutral-300 focus:border-neutral-500" />

        <ul id="select-service"></ul>
      </div>
    </div>

    <div class="wrapper-table">
      <table id="tb-add-sales" class="table">
        <thead class="t-head">
          <tr class="t-row">
            <th>Servicio</th>
            <th style="width: 120px">Precio</th>
            <th style="width: 120px">Acciones</th>
          </tr>
        </thead>

        <tbody class="t-body"></tbody>
      </table>
    </div>

    <div class="flex justify-end">
      <button id="button-add-sale" type="button" class="h-10 w-28 cursor-pointer items-center justify-center rounded-lg p-2 bg-blue-600 text-white font-semibold mt-3">
        Registrar venta
      </button>
    </div>
  </main>
</body>

<script type="module" src="../scripts/index.js"></script>
<script type="module" src="../scripts/add-sale.js"></script>

</html>
