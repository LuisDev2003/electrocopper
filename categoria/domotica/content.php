<?php

$images = [
  "7.avif",
]

?>

<section class="mx-auto max-w-5xl p-3">
  <h1
    class="text-center text-4xl font-bold text-neutral-900 underline underline-offset-4">
    Domótica
  </h1>

  <div class="text-center space-y-4 my-8">
    <p>
      El emplear domotica signica simplicar tareas y disfrutar del tiempo libre
      reduciendo los daños ambientales mediante un sistema inteligente empleando
      tecnologìa de diseño en un espacio.
    </p>
  </div>

  <div>
    <h4 class="font-bold">Materiales:</h4>
    <ul class="list-disc pl-5">
      <li>Sensores De Apertura Inteligente</li>
      <li>Termostato Inteligente</li>
      <li>Modulos Para Persianas</li>
      <li>Enchufes Inteligentes</li>
      <li>Interruptor Inteligente</li>
      <li>Wifi Inteligente</li>
      <li>Asistente De Voz</li>
      <li>Bombillas Inteligentes</li>
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
