<?php

$steps = range(1, 5);

?>

<div class="relative flex items-center">
  <span
    id="indicator"
    class="absolute -z-10 h-0.5 bg-neutral-900 transition-all"
    style="
      --step-active: 1;
      width: calc((var(--step-active) - 1) * 3 / 14 * 100%);
    "></span>

  <ul id="steps" class="relative flex justify-center gap-x-5">
    <?php foreach ($steps as $step): ?>
      <li
        <?= $step === 1 ? 'data-active' : '' ?>
        data-step-index="<?= $step ?>"
        class="step data-active:text-white<?= $step === 1 ? ' active' : '' ?> flex size-10 items-center justify-center rounded-full bg-white font-bold transition-colors text-neutral-900 data-active:bg-neutral-900">
        <span><?= $step ?></span>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
