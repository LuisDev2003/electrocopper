<section id="reseñas" class="mx-auto max-w-3xl">
  <h2
    class="mb-5 text-center text-4xl font-extrabold text-neutral-800 underline underline-offset-4"
  >
    Reseñas
  </h2>

  <p
    id="error-review"
    class="hidden w-fit rounded-xl bg-red-500 p-3 text-center text-white"
  ></p>

  <form class="form flex flex-col items-end pt-2.5 pb-8" autocomplete="off">
    <div class="w-full">
      <div class="mb-2 flex gap-2">
        <input
          type="text"
          name="nombre"
          maxlength="50"
          placeholder="Nombre"
          class="input w-fit"
        />

        <input
          type="text"
          name="codigo"
          placeholder="Código"
          maxlength="6"
          class="input max-w-32"
        />
      </div>
      <textarea
        name="comentario"
        placeholder="Escríbanos una reseña"
        class="textarea min-h-24"
      ></textarea>
    </div>

    <button
      type="submit"
      class="button submit inline-flex gap-x-1 font-semibold"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="size-5 stroke-2"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 14l11 -11" />
        <path
          d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"
        />
      </svg>
      <span>Comentar</span>
    </button>
  </form>

  <ul id="list-reviews" class="space-y-3"></ul>
</section>
