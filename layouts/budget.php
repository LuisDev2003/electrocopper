<?php

require_once 'models/service.php';

$service = new Servicio();

$services = $service->getAll();

$startProject = [
  'En menos de 3 meses',
  'En más de 3 meses',
  'Estoy planificando, no tengo fecha prevista'
];

$budgets = [
  'Hasta 5.000€',
  'Entre 5.000€ y 10.000€',
  'Más de 10.000€'
];

$steps = range(1, 5);

?>

<section>
  <div
    class="mx-auto grid max-w-5xl grid-cols-1 flex-wrap gap-5 px-3 sm:grid-cols-2">
    <div class="space-y-4">
      <h2 class="text-4xl font-extrabold text-neutral-700">Presupuesto</h2>

      <h4 class="text-3xl font-extrabold text-neutral-500">
        No dude en solicitar un presupuesto sin compromiso
      </h4>

      <p>
        En <strong> Electrocopper Riojas </strong> encontrará a los mejores
        profesionales para la realización de todo tipo de reformas para su
        vivienda. Cuentan con una amplia experiencia en el sector, buscando en
        todo momento la máxima satisfacción de sus clientes.
      </p>

      <p>Prestamos servicio en la zona de <strong>Madrid</strong></p>
    </div>

    <div class="flex flex-col items-center justify-center gap-y-4">
      <div class="relative flex items-center">
        <span
          class="absolute -z-10 h-px bg-neutral-900"
          style="
            --step-active: 1;
            width: calc((var(--step-active) - 1) * 3 / 14 * 100%);
          "></span>
        <ul id="steps" class="relative flex justify-center gap-x-5">
          <?php foreach ($steps as $step): ?>
            <li
              data-step-index="<?= $step ?>"
              class="step flex size-10 items-center justify-center rounded-full bg-white font-bold text-neutral-900 data-active:bg-neutral-900 data-active:text-white<?= $step === 1 ? ' active' : '' ?>"
              <?= $step === 1 ? 'data-active' : '' ?>>
              <span><?= $step ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <ul id="contents" class="w-full">
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
        <li data-content-index="2" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">2. ¿Cuando empezamos con tu proyecto?</h3>

            <div class="my-4">
              <ul id="select-date" class="space-y-2">
                <?php foreach ($startProject as $project) : ?>
                  <li>
                    <label>
                      <input
                        required
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
        <li data-content-index="4" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">
              4. Para seguir con tus ideales dejanos tus datos
            </h3>

            <div class="my-4">
              <div id="data-client" class="space-y-2">
                <input
                  required
                  type="text"
                  name="nombres"
                  placeholder="Nombre"
                  class="w-full rounded-lg border border-gray-600 p-2" />

                <input
                  required
                  type="text"
                  name="telefono"
                  placeholder="Teléfono"
                  class="w-full rounded-lg border border-gray-600 p-2" />

                <input
                  required
                  type="text"
                  name="correo"
                  placeholder="Correo eletrónico"
                  class="w-full rounded-lg border border-gray-600 p-2" />
              </div>
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
        <li data-content-index="5" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">5. Danos los detalles de tu proyecto</h3>

            <div class="my-4">
              <div id="message">
                <textarea
                  rows="5"
                  name="mensaje"
                  placeholder="Mensaje"
                  class="w-full rounded-lg border border-gray-600 p-2"></textarea>
              </div>
            </div>

            <div class="flex gap-x-2">
              <button
                data-action="prev"
                type="button"
                class="inline-flex h-10 w-24 cursor-pointer items-center justify-center rounded-lg text-sm font-semibold text-neutral-900">
                Anterior
              </button>
              <button
                type="button"
                class="inline-flex h-10 w-24 cursor-pointer items-center justify-center rounded-lg bg-blue-600 text-sm font-semibold text-blue-50">
                Siguiente
              </button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>
