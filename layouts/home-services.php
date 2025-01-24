<?php

require_once dirname(__DIR__) . "/models/service.php";

$instance = new Servicio();
$services = $instance->getToHome();

?>

<section id="our-services" class="mx-auto max-w-5xl px-3 text-center mt-20">
  <h4 class="text-xl font-semibold text-neutral-500">Lo que hacemos</h4>

  <h2 class="text-4xl font-extrabold text-neutral-900 text-balance mt-3">
    Nuestros Servicios de Reformas Integrales en Madrid
  </h2>

  <div class="my-8 space-y-5 text-neutral-900">
    <p>
      Recuerda nuestra empresa somos expertos en reformas en Madrid y estamos
      aquí para ayudarte en cada paso del camino.
    </p>

    <p>
      No importa el tamaño o la complejidad de tu proyecto y estamos preparados
      para hacerlo realidad. Confía en nosotros y descubre por qué somos la
      elección preferida de muchos clientes satisfechos.
    </p>

    <p>Estos son los principales servicios que ofrecemos:</p>
  </div>

  <ul class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-x-4 gap-y-7 px-3 pb-8">
    <?php foreach ($services as $service): ?>
      <li>
        <a href="servicio?n=<?= $service['nombre'] ?>" class="relative flex h-72 items-center justify-center">
          <img
            src="./images/services/<?= $service["imagen"] ?? "image-not-found.png" ?>"
            alt="Imagen de referencia del servicio"
            class="size-full rounded-lg object-cover object-center border border-neutral-300" />

          <div class="absolute inset-x-3 text-sm inset-y-auto -bottom-3 rounded-lg bg-yellow-400 p-3 text-center font-semibold md:inset-x-5">
            <p title="<?= $service["nombre"] ?>" class="line-clamp-2"><?= $service["nombre"] ?></p>
          </div>
        </a>
      </li>
    <?php endforeach ?>
  </ul>

  <a
    href="./servicios"
    class="mt-8 inline-flex items-center justify-center rounded-xl bg-neutral-900 px-5 py-3 font-bold text-white">
    <span>Ver todos los servicios</span>
    <svg
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-linecap="round"
      stroke-linejoin="round"
      class="ml-1 size-5 stroke-3">
      <path d="M5 12h14" />
      <path d="m12 5 7 7-7 7" />
    </svg>
  </a>
</section>
