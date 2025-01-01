<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electrocopper Riojas</title>

    <link rel="stylesheet" href="../assets/styles/global.css" />
    <link rel="stylesheet" href="../assets/styles/a-header.css" />
    <link rel="stylesheet" href="../assets/styles/a-servicios.css" />
  </head>

  <body>
    <?php require_once "../layout/a-header.php" ?>

    <main>
      <div class="d-1">
        <h2 class="title">Servicios</h2>

        <button id="open-fm-servicio" class="button">
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

      <section class="s-table">
        <table id="tb-servicios" class="table">
          <thead class="t-head">
            <tr class="t-row">
              <th>Nombre</th>
              <th>Descripción</th>
              <th class="actions">Acciones</th>
            </tr>
          </thead>

          <tbody class="t-body"></tbody>
        </table>
      </section>
    </main>

    <dialog id="fm-servicio" class="form-modal">
      <h3 class="title">Agregar servicio</h3>

      <form autocomplete="off" class="form">
        <input type="text" name="nombre" placeholder="Nombre" />
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input id="file-image" type="file" name="imagen" />
        <div id="preview-file-image" class="image"></div>

        <div class="d-1">
          <button type="submit" class="button">Guardar</button>
        </div>
      </form>
    </dialog>

    <dialog id="delete-servicio" class="form-modal delete">
      <h3 class="title">Eliminar servicio</h3>

      <p class="description">¿Desea eliminar el servicio?</p>

      <form autocomplete="off" class="form">
        <input
          id="input-delete-service-id"
          type="text"
          name="servicio_id"
          readonly
          style="display: none"
        />
        <div class="d-1">
          <button type="button" class="button cancel">Cancelar</button>
          <button type="submit" class="button submit delete">Eliminar</button>
        </div>
      </form>
    </dialog>

    <script src="../assets/scripts/a-header.js"></script>
    <script src="../assets/scripts/global.js"></script>
    <script src="../assets/scripts/a-servicios.js"></script>
  </body>
</html>
