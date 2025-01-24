<header id="header" class="header">
  <div class="wrapper">
    <div class="logo">
      <img src="./images/logo.png" alt="Logo de la empresa" class="h-12" />
    </div>

    <div class="wrapper-menu-mobile md:hidden">
      <button
        id="button-menu-mobile"
        type="button"
        aria-label="Mostrar menú"
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

      <?php require_once dirname(__FILE__) . "/header/menu-mobile.php" ?>
    </div>

    <div class="hidden items-center md:flex">
      <?php require_once dirname(__FILE__) . "/header/menu-desktop.php" ?>
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
