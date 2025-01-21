<?php

$images = [
  "brnosite.png",
  "casas.png",
  "fitness.jpg",
  "idl.jpg",
  "rne.png",
  "roan-logistic.png"
];

?>

<section class="mx-auto my-3 grid max-w-5xl grid-cols-[repeat(auto-fit,minmax(175px,1fr))] gap-3 px-3">
  <?php foreach ($images as $image): ?>
    <div class="flex h-32 items-center justify-center">
      <img
        src="./images/clients/<?= $image ?>"
        alt="Cliente"
        class="max-h-full max-w-full object-contain" />
    </div>
  <?php endforeach ?>
</section>
