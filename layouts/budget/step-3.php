<?php

$budgets = [
  'Hasta 5.000€',
  'Entre 5.000€ y 10.000€',
  'Más de 10.000€'
];

?>

<li data-content-index="3" class="content hidden data-active:block">
  <div>
    <h3 class="font-bold">3. ¿Cual es tu presupuesto?</h3>

    <div class="my-4">
      <ul id="select-money" class="space-y-2">
        <?php foreach ($budgets as $budget) : ?>
          <li>
            <label>
              <input
                required
                type="radio"
                name="precio"
                value="<?= $budget ?>" />
              <span class="text-sm"><?= $budget ?></span>
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
