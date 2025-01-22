<?php

require_once "./models/service.php";

$s = new Servicio();

$services = $s->getAll();

?>

<ul class="mx-auto grid max-w-5xl grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-x-4 gap-y-7 px-3 pb-8">
  <?php foreach ($services as $service): ?>
    <li class="relative flex h-72 items-center justify-center">
      <img
        src="./images/services/<?= $service["imagen"] ?? "image-not-found.png" ?>"
        alt="Imagen de referencia del servicio"
        class="size-full rounded-lg object-cover object-center border border-neutral-300" />

      <div class="absolute inset-x-3 text-sm inset-y-auto -bottom-3 rounded-lg bg-yellow-400 p-3 text-center font-semibold md:inset-x-5">
        <p title="<?= $service["nombre"] ?>" class="line-clamp-2"><?= $service["nombre"] ?></p>
      </div>
    </li>
  <?php endforeach ?>
</ul>
