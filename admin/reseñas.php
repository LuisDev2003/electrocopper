<?php 
require_once "./layouts/permissions.php";
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel administrativo - Reseñas</title>

    <link rel="stylesheet" href="./styles/index.css" />
    <link rel="stylesheet" href="./styles/reviews.css" />
  </head>

  <body>
    <?php require_once "./layouts/header.php" ?>

    <main class="main">
      <div class="wrapper-header">
        <h2 class="title">Reseñas</h2>

        <form id="fm-code" class="form">
          <div id="message-fm-code"></div>

          <input type="text" name="codigo" class="input" placeholder="Código" />

          <div class="actions">
            <button id="generate-code" type="button" class="button">
              Generar
            </button>

            <button type="submit" class="button submit">Actualizar</button>
          </div>
        </form>
      </div>

      <div class="wrapper-table">
        <table id="tb-reviews" class="table">
          <thead class="t-head">
            <tr class="t-row">
              <th>Nombre</th>
              <th>Comentario</th>
              <th class="actions">Acciones</th>
            </tr>
          </thead>

          <tbody class="t-body"></tbody>
        </table>
      </div>
    </main>

    <dialog id="delete-review" class="form-modal delete">
      <h3 class="title">Eliminar Reseña</h3>

      <p class="description">¿Desea eliminar la reseña?</p>

      <form autocomplete="off" class="form">
        <input
          id="input-delete-review-id"
          type="text"
          name="review_id"
          readonly
          style="display: none"
        />
        <div class="d-1">
          <button type="button" class="button cancel">Cancelar</button>
          <button type="submit" class="button submit delete">Eliminar</button>
        </div>
      </form>
    </dialog>

    <script type="module" src="./scripts/index.js"></script>
    <script type="module" src="./scripts/reviews.js"></script>
  </body>
</html>
