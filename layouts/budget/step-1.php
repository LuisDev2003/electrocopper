<?php

require_once dirname(__FILE__, 3) . "/models/service.php";

$service = new Servicio();

$services = $service->getAll();

?>

<li
  data-active
  data-content-index="1"
  class="content active hidden data-active:block">
  <div class="p-3">
    <h3 class="font-bold">1. ¿En que te podemos ayudar?</h3>

    <div class="my-4 max-h-60 overflow-auto">
      <ul id="select-services" class="space-y-2">
        <?php foreach ($services as $service) : ?>
          <li>
            <label class="flex items-center gap-x-2">
              <input required type="radio" name="servicio" />
              <span class="truncate text-sm"><?= $service['nombre'] ?></span>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="flex gap-x-2">
      <button
        data-action="next"
        type="button"
        class="inline-flex h-10 w-24 cursor-pointer items-center justify-center rounded-lg bg-blue-600 text-sm font-semibold text-blue-50">
        Siguiente
      </button>
    </div>
  </div>
</li>
