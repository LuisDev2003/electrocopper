<?php
$images = [
  "1.avif",
  "2.avif",
  "3.avif",
  "4.avif",
  "5.avif",
]
?>

<section class="mx-auto max-w-5xl p-3">
  <h1
    class="mb-5 text-center text-4xl font-bold text-neutral-900 underline underline-offset-4">
    Control y automatización
  </h1>

  <p class="my-8 text-center">
    La automatizaciòn son sistemas utilizados para controlar y monitorear un
    proceso, màquina u equipos de manera computarizada que por lo regular cumple
    tareas repititivas. Tiene el objetivo de operar de forma automàtica para asi
    reducir el trabajo humano en la industria.
  </p>

  <div>
    <h4 class="font-bold">Materiales:</h4>
    <ul class="list-disc pl-5">
      <li>Logos</li>
      <li>PLC</li>
      <li>Sensores</li>
      <li>Actuadores</li>
    </ul>
  </div>

  <ul class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-3 my-5">
    <?php foreach ($images as $image) : ?>
      <li class="aspect-square">
        <img src="../../images/static/<?= $image ?>" alt="" class="object-cover object-center size-full">
      </li>
    <?php endforeach ?>
  </ul>
</section>
