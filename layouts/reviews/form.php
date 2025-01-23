<form id="fm-create-review" class="form flex flex-col items-center max-w-lg mx-auto" autocomplete="off">
  <div id="message"></div>

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

    <div id="stars" class="flex justify-center">
      <?php for ($i = 0; $i < 5; $i++) : ?>
        <label data-value="<?= $i + 1 ?>" class="data-hover:[&>svg]:fill-yellow-400 data-active:[&>svg]:fill-yellow-400 px-1">
          <input type="radio" name="estrellas" value="<?= $i + 1 ?>" class="hidden">
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="stroke-1 stroke-yellow-500 cursor-pointer size-8">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
          </svg>
        </label>
      <?php endfor ?>
    </div>

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
