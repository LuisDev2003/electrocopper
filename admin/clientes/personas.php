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
    <title>Panel administrativo - Registrar Personas</title>

    <link rel="shortcut icon" href="../../images/logo.png" type="image/png" />

    <link rel="stylesheet" href="../styles/index.css" />
  </head>

  <body>
    <?php require_once "../layouts/header.php" ?>

    <main class="main">
      <div class="wrapper-header">
        <h2 class="title">Registrar Personas</h2>

        <button id="open-create-person" class="button">
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
        </button>
      </div>

      <div class="wrapper-table">
        <table id="tb-persons" class="table">
          <thead class="t-head">
            <tr class="t-row">
              <th>Nombres</th>
              <th>Apellidos</th>
              <th style="width: 120px">Acciones</th>
            </tr>
          </thead>

          <tbody class="t-body"></tbody>
        </table>
      </div>
    </main>

    <dialog id="create-person" class="form-modal" style="max-width: 420px">
      <h3 class="title">Agregar servicio</h3>

      <form autocomplete="off" class="form">
        <input type="text" name="nombre" placeholder="Nombre" />
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input id="file-image" type="file" name="imagen" />
        <div id="preview-file-image" class="image"></div>

        <div class="d-1">
          <button type="button" class="button cancel">Cancelar</button>

          <button type="submit" class="button submit">Guardar</button>
        </div>
      </form>
    </dialog>
  </body>

  <script type="module" src="../scripts/index.js"></script>
  <script type="module" src="../scripts/person.js"></script>
</html>
