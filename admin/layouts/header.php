<?php

$menu = [
  'Servicios' => './servicios',
  'Reseñas' => './reseñas',
  'Empleados' => './empleados',
  'Clientes - Personas' => './clientes/personas',
  'Clientes - Empresas' => './clientes/empresas',
  'Ventas' => './ventas',
  'Cotizaciones' => './cotizaciones',
  'Cerrar sesión' => '../controllers/auth.controller.php',
];

$menuDepth = [
  'Servicios' => '../servicios',
  'Reseñas' => '../reseñas',
  'Empleados' => '../empleados',
  'Clientes - Personas' => '../clientes/personas',
  'Clientes - Empresas' => '../clientes/empresas',
  'Ventas' => '../ventas',
  'Cotizaciones' => '../cotizaciones',
  'Cerrar sesión' => '../../controllers/auth.controller.php',
];

$menuRender = isset($isDepth) && $isDepth ? $menuDepth : $menu;

?>

<header id="header" class="header">
  <div class="wrapper">
    <div class="logo">
      <img src=<?= $pathImage ?? "../images/logo.png" ?>
        alt="Logo de la empresa" height="48" />
    </div>

    <div class="handle-menu">
      <button
        id="button-toggle-sidebar"
        type="button"
        aria-label="Mostrar menú"
        data-status="close"
        class="button">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="open">
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
          class="close">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M18 6l-12 12" />
          <path d="M6 6l12 12" />
        </svg>
      </button>

      <aside id="sidebar" class="sidebar">
        <div class="user">
          <h4 class="name"><?= $_SESSION["nombres"] ?></h4>
          <h5 class="email"><?= $_SESSION["correo"] ?></h5>
        </div>
        <div class="wrapper-menu">
          <ul class="menu">
            <?php foreach ($menuRender as $item => $link): ?>
              <li>
                <a
                  href="<?= $link ?>"
                  class="<?= ($item == 'Cerrar sesión') ? 'item logout' : 'item' ?>">
                  <?= $item ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</header>
