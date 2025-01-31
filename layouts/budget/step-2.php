<?php

$startProject = [
  'En menos de 3 meses',
  'En más de 3 meses',
  'Estoy planificando, no tengo fecha prevista'
];

?>

<li data-content-index="2" class="content hidden data-active:block">
  <div>
    <h3 class="font-bold">2. ¿Tienes fecha definida para empezar? ¿Díganos para cuándo?</h3>

    <div class="my-4">
      <ul id="select-date" class="space-y-2">
        <?php foreach ($startProject as $project) : ?>
          <li>
            <label>
              <input
                type="radio"
                name="fecha"
                value="<?= $project ?>" />
              <span class="text-sm"><?= $project ?></span>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="flex gap-x-2">
      <button
        data-action="prev"
        type="button"
        class="inline-flex h-10 w-24 cursor-pointer items-center justify-center rounded-lg text-sm font-semibold text-neutral-900">
        Anterior
      </button>
      <button
        data-action="next"
        type="button"
        class="inline-flex h-10 w-24 cursor-pointer items-center justify-center rounded-lg bg-blue-600 text-sm font-semibold text-blue-50">
        Siguiente
      </button>
    </div>
  </div>
</li>
