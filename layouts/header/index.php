<?php include_once dirname(__DIR__, 2) . "/config/index.php"; ?>

<header class="sticky top-0 z-50 w-full bg-white">
  <div
    class="mx-auto flex h-16 max-w-5xl items-center justify-between gap-x-3 px-3">
    <div class="drop-shadow-lg">
      <img src="<?= $baseURL . "images/logo.png" ?>" alt="Logo de la empresa" class="h-12" />
    </div>

    <div class="relative grow md:hidden">
      <button
        id="button-menu-mobile"
        type="button"
        aria-label="Mostrar menú"
        class="float-right flex size-10 cursor-pointer items-center justify-center rounded-xl bg-neutral-800 text-white [&[data-active]+ul]:block [&[data-active]>.close]:block [&[data-active]>.open]:hidden">
        <svg
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="open size-6 stroke-2">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 6l16 0" />
          <path d="M4 12l16 0" />
          <path d="M4 18l16 0" />
        </svg>

        <svg
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="close hidden size-6 stroke-2">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M18 6l-12 12" />
          <path d="M6 6l12 12" />
        </svg>
      </button>

      <?php require_once dirname(__FILE__) . "/menu-mobile.php" ?>
    </div>

    <div class="hidden items-center md:flex">
      <?php require_once dirname(__FILE__) . "/menu-desktop.php" ?>
    </div>
  </div>
</header>

<a
  href="https://wa.me/604982792"
  target="_blank"
  aria-label="Whatsapp"
  class="fixed right-3 bottom-3 z-999 rounded-full !bg-green-400 !p-1.5">
  <svg
    viewBox="0 0 24 24"
    fill="none"
    stroke-width="1.75"
    stroke-linecap="round"
    stroke-linejoin="round"
    class="size-10 stroke-white">
    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
    <path
      d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
  </svg>
</a>
