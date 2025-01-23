<?php

require_once "./models/review.php";

$r = new Review();

$reviews = $r->getAll();
$stars = range(1, 5); ?>

<section id="reseñas" class="mx-auto max-w-3xl">
  <h2
    class="mb-5 text-center text-4xl font-extrabold text-neutral-800 underline underline-offset-4">
    Reseñas
  </h2>

  <p
    id="error-review"
    class="hidden w-fit rounded-xl bg-red-500 p-3 text-center text-white"></p>

  <form class="form flex flex-col items-end pt-2.5 pb-8" autocomplete="off">
    <div class="w-full">
      <div class="mb-2 flex gap-2">
        <input
          type="text"
          name="nombre"
          maxlength="50"
          placeholder="Nombre"
          class="input w-fit" />

        <input
          type="text"
          name="codigo"
          placeholder="Código"
          maxlength="6"
          class="input max-w-32" />
      </div>
      <textarea
        name="comentario"
        placeholder="Escríbanos una reseña"
        class="textarea min-h-24"></textarea>
    </div>

    <button
      type="submit"
      class="button submit inline-flex gap-x-1 font-semibold">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="size-5 stroke-2">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 14l11 -11" />
        <path
          d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
      </svg>
      <span>Comentar</span>
    </button>
  </form>

  <ul class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-5">
    <?php foreach ($reviews as $review) : ?>
      <li>
        <div class="space-y-2 border border-red-500">
          <div>
            <h4 class="font-bold"><?= $review["nombre_cliente"] ?></h4>

            <span class="text-xs text-neutral-700"><?= $review["created_at"] ?></span>
          </div>

          <div class="flex">
            <?php foreach ($stars as $star) : ?>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="fill-yellow-400">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
              </svg>
            <?php endforeach; ?>
          </div>

          <div><?= $review["comentario"] ?></div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>

  <ul id="list-reviews" class="space-y-3"></ul>
</section>
