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
    <title>Panel administrativo - Registrar Venta</title>

    <link rel="shortcut icon" href="../../images/logo.png" type="image/png" />

    <link rel="stylesheet" href="../styles/index.css" />

    <style>
      .wrapper-header {
        align-items: start;
        flex-wrap: wrap;
        gap: 12px;
      }

      .search {
        position: relative;
        display: flex;
        align-items: center;
        column-gap: 8px;
        width: 100%;
        max-width: 320px;
        flex: 1 0 200px;
      }

      /* .search:has(button.close) #select-service {
        display: none;
      } */

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

      .input {
        width: 100%;
        outline: none;
        padding: 10px 12px;
        width: 100%;
        border-radius: 8px;
        border: 1px solid var(--gray);
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

      .button.submit {
        margin-top: 8px;
        font-weight: bold;
        padding: 12px;
        border-radius: 12px;
        background-color: #2563eb;
        color: #eff6ff;
      }
    </style>
  </head>

  <body>
    <?php require_once "../layouts/header.php" ?>

    <main class="main">
      <div class="wrapper-header">
        <h2 class="title">Registrar Venta</h2>

        <div class="search">
          <button id="toggle-select-service" type="button" class="button close">
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
              class="open"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
              <path
                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"
              />
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
              class="close"
            >
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
            class="input"
          />

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

      <div style="display: flex; justify-content: end">
        <button id="button-add-sale" type="button" class="button submit">
          Registrar venta
        </button>
      </div>
    </main>
  </body>

  <script type="module" src="../scripts/index.js"></script>
  <script type="module" src="../scripts/add-sale.js"></script>
</html>
