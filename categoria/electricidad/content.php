<?php

$images = [
  "11.avif",
  "12.avif",
  "13.avif",
  "14.avif",
  "15.avif",
  "16.avif",
  "17.avif",
  "18.avif",
  "19.avif",
  "20.avif",
  "21.avif",
]

?>

<section class="mx-auto max-w-5xl p-3">
  <h1
    class="text-center text-4xl font-bold text-neutral-900 underline underline-offset-4">
    Electricidad
  </h1>

  <div class="text-center space-y-4 my-8">
    <p>
      La electricidad es una energia potente y veloz pero de facil manejo el vivir
      con electricidad es un punto importante para la vida cotidiana .
    </p>
  </div>


  <div>
    <h4 class="font-bold">Materiales:</h4>
    <ul class="list-disc pl-5">
      <li>Cables</li>
      <li>Automaticos</li>
      <li>Enchufes</li>
      <li>Interruptores</li>
      <li>Làmparas</li>
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
