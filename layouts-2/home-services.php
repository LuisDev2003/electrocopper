<?php

$images = [
  "diseño.jpg",
  "electricidad.jpg",
  "iluminación-2.jpg",
];

?>

<section id="our-services">
  <h4 class="sub-title">Lo que hacemos</h4>
  <h2 class="title">Nuestros Servicios de Reformas Integrales en Madrid</h2>

  <p class="paragraph">
    Recuerda nuestra empresa somos expertos en reformas en Madrid y estamos aquí
    para ayudarte en cada paso del camino.
  </p>

  <p class="paragraph">
    No importa el tamaño o la complejidad de tu proyecto y estamos preparados
    para hacerlo realidad. Confía en nosotros y descubre por qué somos la
    elección preferida de muchos clientes satisfechos.
  </p>

  <p class="paragraph">Estos son los principales servicios que ofrecemos:</p>

  <section id="services">
    <?php foreach ($images as $image): ?>
    <div class="item">
      <img
        src="./images/new-services/<?= $image ?>"
        alt="Servicio"
        class="image"
      />
      <p class="name"><?= $image ?></p>
    </div>
    <?php endforeach ?>
  </section>

  <a href="./servicios" class="button">
    <span>Ver todos los servicios</span>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="20"
      height="20"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2.5"
      stroke-linecap="round"
      stroke-linejoin="round"
      class="icon"
    >
      <path d="M5 12h14" />
      <path d="m12 5 7 7-7 7" />
    </svg>
  </a>
</section>
