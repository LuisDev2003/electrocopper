<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electrocopper Riojas</title>

    <link rel="stylesheet" href="../assets/styles/admin.css" />
    <link rel="stylesheet" href="../assets/styles/a-servicios.css" />
  </head>

  <body>
    <header id="header" class="header">
      <div class="wrapper">
        <div class="logo">
          <img src="../images/logo.png" alt="" height="48" />
        </div>

        <div class="navegation">
          <button
            id="button-toggle-menu"
            type="button"
            aria-label="Mostrar menú"
            data-status="close"
            class="button"
          >
            <svg
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
              <path d="M4 6l16 0" />
              <path d="M4 12l16 0" />
              <path d="M4 18l16 0" />
            </svg>

            <svg
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
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>
          </button>

          <nav id="nav-menu" class="menu">
            <a href="../" class="item">Inicio</a>
            <a href="./servicios" class="item">Servicios</a>
            <a href="./reseñas" class="item">Reseñas</a>
          </nav>
        </div>
      </div>
    </header>

    <aside id="sidebar-menu" class="sidebar">
      <ul class="menu">
        <li>
          <a href="../" class="item">Inicio</a>
        </li>
        <li>
          <a href="./servicios" class="item">Servicios</a>
        </li>
        <li>
          <a href="./reseñas" class="item">Reseñas</a>
        </li>
      </ul>
    </aside>

    <main>
      <div class="d-1">
        <h2 class="title">Reseñas</h2>
      </div>

      <div class="d-2">
        <div id="message-fm-code"></div>

        <form id="fm-code" class="form">
          <input type="text" name="codigo" class="input" placeholder="Código" />

          <button id="generate-code" type="button" class="button">
            Generar
          </button>
          <button type="submit" class="submit">Actualizar</button>
        </form>
      </div>

      <section class="s-table">
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
      </section>
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

    <script src="../assets/scripts/admin.js"></script>
  </body>
</html>
