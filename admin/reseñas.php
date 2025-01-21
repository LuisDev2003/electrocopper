<?php require_once "./layouts/permissions.php"; ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel administrativo - Reseñas</title>

    <?php require_once "./layouts/meta.php"; ?>

    <link rel="stylesheet" href="../styles/output.css" />
  </head>

  <body>
    <?php require_once "./layouts/header.php" ?>

    <main class="main">
      <div class="mb-3 flex items-center justify-between">
        <h2 class="text-2xl font-bold">Reseñas</h2>

        <button
          id="open-generate-code"
          class="cursor-pointer rounded-xl bg-neutral-800 p-2 text-white"
        >
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="size-6 stroke-2"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"
            />
            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
          </svg>
        </button>
      </div>

      <dialog id="dl-generate-code" class="form-modal w-95/100 max-w-96">
        <div class="flex items-center justify-between">
          <h2 class="title">Generar código</h2>

          <button type="button" class="close mb-5 cursor-pointer">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="size-6 stroke-2"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>
          </button>
        </div>

        <form id="fm-code" class="space-y-2">
          <div id="message-fm-code"></div>

          <div class="flex flex-col items-center gap-y-6">
            <input
              type="text"
              name="codigo"
              class="h-10 rounded-lg border border-neutral-300 px-3 text-center font-mono tracking-widest outline-none focus:border-neutral-500"
              placeholder="Código"
            />

            <div class="flex gap-x-2">
              <button
                id="generate-code"
                type="button"
                class="h-10 w-32 cursor-pointer rounded-lg bg-yellow-400 px-3 text-center text-sm font-semibold text-yellow-900 select-none"
              >
                Generar
              </button>

              <button
                type="submit"
                class="h-10 w-32 cursor-pointer rounded-lg bg-blue-600 px-3 text-center text-sm font-semibold text-white select-none"
              >
                Actualizar
              </button>
            </div>
          </div>
        </form>
      </dialog>

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
