<?php require_once "./layouts/permissions.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel administrativo - Servicios</title>

  <?php require_once "./layouts/meta.php"; ?>

  <link rel="stylesheet" href="../styles/output.css" />
</head>

<body>
  <?php require_once "./layouts/header.php" ?>

  <main>
    <div class="flex justify-between items-center mb-3">
      <h2 class="text-2xl font-bold">Servicios</h2>

      <button id="open-create-service" class="bg-neutral-800 text-white p-2 rounded-xl cursor-pointer">
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
      <table id="tb-servicios" class="table">
        <thead class="t-head">
          <tr class="t-row">
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th class="actions">Acciones</th>
          </tr>
        </thead>

        <tbody class="t-body"></tbody>
      </table>
    </div>
  </main>

  <dialog id="create-service" class="form-modal max-w-96">
    <h3 class="title">Agregar servicio</h3>

    <form autocomplete="off" class="form">
      <input type="text" name="nombre" placeholder="Nombre" />
      <select name="categoria_id" id="select-category"></select>
      <textarea name="descripcion" placeholder="Descripción"></textarea>
      <input id="file-image" type="file" name="imagen" />
      <div id="preview-file-image" class="image"></div>

      <div class="actions">
        <button type="button" class="button cancel">Cancelar</button>

        <button type="submit" class="button submit">Guardar</button>
      </div>
    </form>
  </dialog>

  <dialog id="delete-service" class="form-modal delete">
    <p class="description">¿Desea eliminar el servicio?</p>

    <form autocomplete="off" class="form">
      <input
        id="input-delete-service-id"
        type="text"
        name="servicio_id"
        readonly
        class="hidden" />

      <div class="actions">
        <button type="button" class="button cancel">Cancelar</button>
        <button type="submit" class="button submit delete">Eliminar</button>
      </div>
    </form>
  </dialog>
</body>

<script type="module" src="./scripts/index.js"></script>
<script type="module" src="./scripts/services.js"></script>

</html>
