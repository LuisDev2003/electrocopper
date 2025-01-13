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

<section id="brands">
  <?php foreach ($images as $image): ?>
    <div class="item">
      <img src="./images/brands/<?= $image ?>" alt="" />
    </div>
  <?php endforeach ?>
</section>
