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

<section id="services">
  <?php foreach ($images as $image): ?>
  <div class="item">
    <img
      src="./images/new-services/<?= $image ?>"
      alt="Cliente"
      class="image"
    />
    <p class="name"><?= $image ?></p>
  </div>
  <?php endforeach ?>
</section>
