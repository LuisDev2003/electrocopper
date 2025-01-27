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
    class="text-center text-4xl font-bold text-neutral-900 underline underline-offset-4">
    Control y automatización
  </h1>

  <div class="text-center space-y-4 my-8">
    <p>
      La automatizaciòn son sistemas utilizados para controlar y monitorear un
      proceso, màquina u equipos de manera computarizada que por lo regular cumple
      tareas repititivas. Tiene el objetivo de operar de forma automàtica para asi
      reducir el trabajo humano en la industria.
    </p>
  </div>

  <div>
    <h4 class="font-bold">Materiales:</h4>
    <ul class="list-disc pl-5">
      <li>Logos</li>
      <li>PLC</li>
      <li>Sensores</li>
      <li>Actuadores</li>
    </ul>
  </div>

  <ul class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-3 my-5">
    <?php foreach ($images as $image) : ?>
      <li class="aspect-square">
        <img loading="lazy" src="../../images/static/<?= $image ?>" alt="" class="object-cover object-center size-full">
      </li>
    <?php endforeach ?>
  </ul>
</section>
