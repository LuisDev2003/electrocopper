<?php

require_once "./models/review.php";

$r = new Review();

$reviews = $r->getAll();

function formatDate(string $date): string
{
  try {
    $dateObj = new DateTime($date);
    $formatted = $dateObj->format("d/m/Y");

    return $formatted;
  } catch (Exception $e) {
    return "Fecha inválida";
  }
}

?>


<ul id="review-list" class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-5 my-8">
  <?php foreach ($reviews as $review) : ?>
    <li>
      <div class="space-y-2 border border-neutral-300 p-3 rounded-lg">
        <div>
          <h4 class="font-bold"><?= $review["nombre_cliente"] ?></h4>

          <span class="text-xs text-neutral-700"><?= formatDate($review["created_at"]) ?></span>
        </div>

        <?php require dirname(__FILE__) . "/star.php" ?>

        <div><?= $review["comentario"] ?></div>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
