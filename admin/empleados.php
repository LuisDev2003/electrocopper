<?php
require_once "./layouts/permissions.php";
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel administrativo - Empleados</title>

    <link rel="shortcut icon" href="../images/logo.png" type="image/png" />

    <link rel="stylesheet" href="./styles/index.css" />
  </head>

  <body>
    <?php require_once "./layouts/header.php" ?>

    <main class="main">
      <div class="wrapper-header">
        <h2 class="title">Empleados</h2>

        <button id="open-create-employee" class="button">
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
        <table id="tb-employees" class="table">
          <thead class="t-head">
            <tr class="t-row">
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Correo</th>
              <th class="actions">Acciones</th>
            </tr>
          </thead>

          <tbody class="t-body"></tbody>
        </table>
      </div>
    </main>

    <dialog id="create-employee" class="form-modal" style="max-width: 480px">
      <h3 class="title">Agregar empleado</h3>

      <form autocomplete="off" class="form">
        <div id="create-message"></div>

        <input type="text" name="nombres" placeholder="Nombres" />
        <input type="text" name="apellidos" placeholder="Apellidos" />
        <input type="email" name="correo" placeholder="Correo" />

        <div class="d-1">
          <button type="button" class="button cancel">Cancelar</button>
          <button type="submit" class="button submit">Guardar</button>
        </div>
      </form>
    </dialog>

    <dialog id="delete-employee" class="form-modal delete">
      <h3 class="title">Eliminar empleado</h3>

      <p class="description">¿Desea eliminar el empleado?</p>

      <form autocomplete="off" class="form">
        <input
          id="input-delete-employee-id"
          type="text"
          name="empleado_id"
          readonly
          style="display: none"
        />

        <div class="d-1">
          <button type="button" class="button cancel">Cancelar</button>
          <button type="submit" class="button submit delete">Eliminar</button>
        </div>
      </form>
    </dialog>
  </body>

  <script type="module" src="./scripts/index.js"></script>
  <script type="module" src="./scripts/employee.js"></script>
</html>
