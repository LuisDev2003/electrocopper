<?php

$images = [
  "diseño.jpg",
  "electricidad.jpg",
  "iluminación-2.jpg",
  "iluminación.jpg",
  "mecanismo.jpg",
  "montaje-cuadro.jpg",
  "telecomunicaciones.jpg",
  "tiras-led.jpg"
];

?>

<section
  class="mx-auto grid max-w-5xl grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-x-4 gap-y-7 px-3 pb-8">
  <?php foreach ($images as $image): ?>
    <div class="relative flex h-72 items-center justify-center">
      <img
        src="./images/new-services/<?= $image ?>"
        alt="Cliente"
        class="size-full rounded-xl object-cover object-center" />
      <p
        class="absolute inset-x-3 inset-y-auto -bottom-3 rounded-xl bg-yellow-400 p-3 text-center font-bold md:inset-x-5">
        <?= $image ?>
      </p>
    </div>
  <?php endforeach ?>
</section>
