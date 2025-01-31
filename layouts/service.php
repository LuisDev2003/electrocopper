<?php

require_once dirname(__DIR__) . "/models/service.php";

$instance = new Servicio();

$service = $instance->findByName($name);

?>

<div class="bg-white mx-auto">
  <div class="pt-6">
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:px-8">
      <img src="<?= buildURL($service["imagen"] ?? "image-not-found.png", "images/services/") ?>" alt="<?= $service["nombre"] ?>" class="size-60 rounded-lg object-cover lg:block">
    </div>

    <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"><?= $service["nombre"] ?></h1>
      </div>

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pr-8 lg:pb-16">
        <div>
          <h3 class="sr-only">Description</h3>

          <div class="space-y-6">
            <p class="text-base text-gray-900"><?= $service["descripcion"] ?? "No tiene una descripción" ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
