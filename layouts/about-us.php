<?php

$reasons = [
  "Porque contamos con la experiencia y capacidad requerida",
  "Porque realizamos seguimiento a nuestros clientes y proyectos después de haber finalizado los trabajos.",
  "Porque nos adecuamos a la necesidad y al presupuesto de cada cliente",
  "Porque realizamos un trabajo con calidad y seguridad aplicando la mejora continua."
];

$boxs = [
  "Misión" => "Electrocopper Riojas se proyecta en la inserción del mercado laboral comprometido a ser uno de los mejores en el rubro de electricidad, desarrollando trabajos altamente conceptuados y con tecnología de punta proporcionando asesoramiento y consultoría experta para la toma de decisiones en cuanto a sistemas de electrificación, automatización y domótica.",
  "Visión" => "Electrocopper Riojas tiene la misión de brindar un trabajo de calidad y seguridad a nuestros clientes, con la intervención del personal adecuado y utilizando la innovación tecnológica en sistema de electricidad alcanzando la satisfacción y confort de quienes nos eligen."
]

?>
<section class="mx-auto my-8 max-w-3xl px-3">
  <div class="pb-12 text-center">
    <h2
      class="mb-5 text-4xl font-bold text-neutral-900 underline underline-offset-4">
      Quienes somos…
    </h2>

    <p class="text-pretty">
      Somos una empresa que se desarrolla en el mercado español, especialistas
      en instalaciones eléctricas domiciliarias e industriales, automatizamos
      tus instalaciones eléctricas, reformamos pisos en forma general. Nos
      enfocamos en la satisfacción del cliente para lo cual contamos con una
      amplia experiencia en la ejecución de proyectos caracterizándonos por
      ejecutar los trabajos a tiempo pactado.
    </p>
  </div>

  <div class="grid sm:grid-cols-2 gap-6 bg-sky-700 rounded-4xl p-6">
    <?php foreach ($boxs as $name => $content) : ?>
      <div class="bg-white p-5 rounded-xl text-center">
        <h3 class="text-xl font-bold mb-5"><?= $name ?></h3>

        <p><?= $content ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="flex hidden flex-col items-center justify-center">
    <div id="tabs" class="relative flex items-start">
      <div
        id="indicator"
        class="absolute top-0 left-0 -z-10 h-10 w-32 translate-x-0 rounded-lg border border-neutral-100 shadow-lg shadow-neutral-500/20 transition-transform"></div>
    </div>

    <div id="tabs-content" class="mt-3.5"></div>
  </div>

  <div class="py-12">
    <h2 class="mb-5 text-3xl font-bold text-neutral-900 underline underline-offset-4">
      ¿Por qué elegirnos?
    </h2>

    <ol class="list-decimal space-y-2 pl-8">
      <?php foreach ($reasons as $reason) : ?>
        <li>
          <p><?= $reason ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>
