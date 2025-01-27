<?php

$images = [
  "8.avif",
  "9.avif",
  "10.avif",
]

?>

<section class="mx-auto max-w-5xl p-3">
  <h1
    class="text-center text-4xl font-bold text-neutral-900 underline underline-offset-4">
    Telecomunicaciones
  </h1>

  <div class="text-center space-y-4 my-8">
    <p>
      Son servicios que facilitan la transmision de informacion , datos y señales de un lugar a otro.
    </p>

    <p>
      Este proceso se se realiza mediante diferentes medios como cables, bra optica ,etc.
    </p>
  </div>


  <div>
    <h4 class="font-bold">Materiales:</h4>
    <ul class="list-disc pl-5">
      <li>Toma de datos</li>
      <li>Cable UTP cat. 5e , 6e</li>
      <li>Conectores RJ 45</li>
      <li>Repartidor de señal</li>
      <li>Router</li>
      <li>Caja PAU</li>
    </ul>
  </div>

  <ul class="my-5 grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-3">
    <?php foreach ($images as $image) : ?>
      <li class="aspect-square">
        <img
          loading="lazy"
          src="../../images/static/<?= $image ?>"
          alt=""
          class="size-full object-cover object-center" />
      </li>
    <?php endforeach ?>
  </ul>
</section>
