<?php

require_once dirname(__FILE__, 3) . "/models/service.php";

$instance_service = new Servicio();

$services = $instance_service->getAll();

?>

<li
  data-active
  data-content-index="1"
  class="content active hidden data-active:block">
  <div class="p-3">
    <h3 class="font-bold">1. ¿En qué te podemos ayudar?</h3>

    <div class="my-4 max-h-60 overflow-auto">
      <ul id="select-services" class="space-y-2">
        <?php foreach ($services as $service) : ?>
          <li>
            <label class="flex items-center gap-x-2">
              <input type="checkbox" name="servicio[]" value="<?= $service['nombre'] ?>" />
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
