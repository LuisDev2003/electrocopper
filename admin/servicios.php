<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electrocopper Riojas</title>

    <link rel="stylesheet" href="../assets/styles/global.css" />
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
            <a href="./servicios" class="item">Servicios</a>
            <a href="./reseñas" class="item">Reseñas</a>
          </nav>
        </div>
      </div>
    </header>

    <aside id="sidebar-menu" class="sidebar">
      <ul class="menu">
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

    <script>
      const buttonOpenMenu = document.querySelector("#button-toggle-menu");
      const sidebarMenu = document.querySelector("#sidebar-menu");

      function toggleStatusMenu() {
        const status = buttonOpenMenu.dataset.status;

        if (status === "open") {
          buttonOpenMenu.dataset.status = "close";

          sidebarMenu.classList.remove("open");
        } else {
          buttonOpenMenu.dataset.status = "open";

          sidebarMenu.classList.add("open");
        }
      }

      buttonOpenMenu.addEventListener("click", toggleStatusMenu);
    </script>
    <script src="../assets/scripts/global.js"></script>

    <script src="../assets/scripts/a-servicios.js"></script>
  </body>
</html>
