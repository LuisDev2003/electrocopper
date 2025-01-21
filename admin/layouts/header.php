<?php

$currentDepth = isset($currentDepth) ? $currentDepth : 0;
function generateMenu($currentDepth)
{
  $basePaths = [
    'Servicios' => 'servicios',
    'Categoría' => 'categoria',
    'Reseñas' => 'reseñas',
    'Empleados' => 'empleados',
    'Clientes - Personas' => 'clientes/personas',
    'Clientes - Empresas' => 'clientes/empresas',
    'Ventas' => 'ventas',
    'Cotizaciones' => 'cotizaciones',
    "Cerrar sesión" => "../controllers/auth.controller.php"
  ];

  $menu = [];
  foreach ($basePaths as $label => $path) {
    $menu[$label] = str_repeat('../', $currentDepth) . $path;
  }

  return $menu;
}

$menu = generateMenu($currentDepth);

?>

<header id="header" class="w-full sticky top-0 z-50 bg-neutral-800 text-white">
  <div class="h-16 max-w-5xl mx-auto flex items-center justify-between px-2">
    <div class="logo">
      <img src="<?= $pathImage ?? "../images/logo.png" ?>" alt="Logo de la empresa" class="h-12" />
    </div>

    <div class="relative">
      <button
        id="button-toggle-sidebar"
        type="button"
        aria-label="Mostrar menú"
        data-status="close"
        class="w-10 h-10 flex justify-center items-center text-white bg-transparent rounded-lg p-1 hover:bg-neutral-700 group cursor-pointer [&[data-status='close']>.close]:hidden [&[data-status='open']>.open]:hidden">
        <!-- Ícono de menú -->
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

        <!-- Ícono de cerrar -->
        <svg
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="close size-6 stroke-2">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M18 6l-12 12" />
          <path d="M6 6l12 12" />
        </svg>
      </button>


      <aside id="sidebar" class="absolute top-12 right-0 z-40 w-60 rounded-xl h-0 overflow-hidden bg-neutral-800 text-white [&.open]:h-fit">
        <div class="p-4 border-b border-gray-400">
          <h4 class="font-bold"><?= $_SESSION["nombres"] ?></h4>
          <h5 class="text-sm"><?= $_SESSION["correo"] ?></h5>
        </div>
        <div class="max-h-80 overflow-y-auto">
          <ul class="relative p-3 space-y-1">
            <?php $last = end($menu); ?>
            <?php foreach ($menu as $label => $url): ?>
              <li>
                <?php if ($url === $last): ?>
                  <a href="<?= $url ?>" class="flex rounded-lg h-10 items-center px-2 bg-red-500 hover:bg-red-600">
                    <?= $label ?>
                  </a>
                <?php else: ?>
                  <a href="<?= $url ?>" class="flex rounded-lg h-10 items-center px-2 hover:bg-neutral-700">
                    <?= $label ?>
                  </a>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</header>
