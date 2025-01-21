<?php

$images = [
  "bjc.png",
  "celer.png",
  "fermax.png",
  "jiso.png",
  "legrand.png",
  "mazda.png",
  "niessen.jpg",
  "philips.png",
  "scheider.png",
  "simon.png",
  "tegui.jpg"
]

?>

<ul class="mx-auto grid max-w-5xl grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-2 py-24">
  <?php foreach ($images as $image): ?>
    <li class="flex h-25 items-center justify-center">
      <img
        src="./images/brands/<?= $image ?>"
        alt="Marcas de Empresas"
        class="object-contain" />
    </li>
  <?php endforeach ?>
</ul>
