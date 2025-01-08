<section id="reseñas" class="reviews">
  <h2 class="title">Reseñas</h2>

  <p id="error-review" class="error"></p>

  <form class="form" autocomplete="off">
    <div class="wrapper">
      <div class="group-input">
        <input
          type="text"
          name="nombre"
          maxlength="50"
          placeholder="Nombre"
          class="input" />

        <input
          type="text"
          name="codigo"
          placeholder="Código"
          maxlength="6"
          class="input" />
      </div>
      <textarea
        name="comentario"
        placeholder="Escríbanos una reseña"
        class="textarea"></textarea>
    </div>

    <button type="submit" class="button">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 14l11 -11" />
        <path
          d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
      </svg>
      Comentar
    </button>
  </form>

  <ul id="list-reviews">
    <li class="review-item">
      <article class="review">
        <div class="d-1">
          <h4 class="username">Cliente 1</h4>
          <span class="date">31-12-24</span>
        </div>

        <div class="d-2">
          <p class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Labore voluptate sed deleniti earum qui sunt recusandae enim
            quam suscipit dolores!
          </p>
        </div>
      </article>
    </li>
    <li class="review-item">
      <article class="review">
        <div class="d-1">
          <h4 class="username">Cliente 2</h4>
          <span class="date">31-12-24</span>
        </div>

        <div class="d-2">
          <p class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Labore voluptate sed deleniti earum qui sunt recusandae enim
            quam suscipit dolores!
          </p>
        </div>
      </article>
    </li>
    <li class="review-item">
      <article class="review">
        <div class="d-1">
          <h4 class="username">Cliente 3</h4>
          <span class="date">31-12-24</span>
        </div>

        <div class="d-2">
          <p class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Labore voluptate sed deleniti earum qui sunt recusandae enim
            quam suscipit dolores!
          </p>
        </div>
      </article>
    </li>
  </ul>
</section>
