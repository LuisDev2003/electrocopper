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

<div id="clients">
  <?php foreach ($images as $image): ?>
    <div class="item">
      <img src="./images/clients/<?= $image ?>" alt="Cliente" />
    </div>
  <?php endforeach ?>
</div>
