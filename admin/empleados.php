<?php require_once "./layouts/permissions.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel administrativo - Empleados</title>

  <?php require_once "./layouts/meta.php"; ?>

  <link rel="stylesheet" href="../styles/output.css" />
</head>

<body>
  <?php require_once "./layouts/header.php" ?>

  <main>
    <div class="flex justify-between items-center mb-3">
      <h2 class="text-2xl font-bold">Servicios</h2>

      <button id="open-create-employee" class="bg-neutral-800 text-white p-2 rounded-xl cursor-pointer">
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

      <div class="actions">
        <button type="button" class="button cancel">Cancelar</button>
        <button type="submit" class="button submit">Guardar</button>
      </div>
    </form>
  </dialog>

  <dialog id="delete-employee" class="form-modal delete">
    <p class="description">¿Desea eliminar el empleado?</p>

    <form autocomplete="off" class="form">
      <input
        id="input-delete-employee-id"
        type="text"
        name="empleado_id"
        readonly
        style="display: none" />

      <div class="actions">
        <button type="button" class="button cancel">Cancelar</button>
        <button type="submit" class="button submit delete">Eliminar</button>
      </div>
    </form>
  </dialog>
</body>

<script type="module" src="./scripts/index.js"></script>
<script type="module" src="./scripts/employee.js"></script>

</html>
