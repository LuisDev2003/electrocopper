<?php

$menu = [
  "Inicio" => "./#",
  "Servicios" => "./#servicios",
  "Sobre nosotros" => "./#sobre-nosotros",
  "Contactos" => "./#contactos",
  "Reseñas" => "./#reseñas",
];

?>

<div id="background"></div>

<header id="header" class="header">
  <div class="wrapper">
    <div class="logo">
      <img src="./images/logo.png" alt="Logo de la empresa" height="48" />
    </div>

    <div class="navegation">
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

      <nav id="nav-menu" class="nav-menu">
        <?php foreach ($menu as $item => $link): ?>
          <a href="<?= $link ?>" class="item"><?= $item ?></a>
        <?php endforeach; ?>
      </nav>
    </div>

    <div class="contact">
      <a
        href="https://wa.me/604982792"
        target="_blank"
        class="button"
        style="--bp: -59px -8.85px">
        <span class="sr-only">Whatsapp</span>
      </a>
    </div>
  </div>
</header>

<aside id="sidebar" class="sidebar">
  <ul class="menu">
    <?php foreach ($menu as $item => $link): ?>
      <li>
        <a href="<?= $link ?>" class="item"><?= $item ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>
