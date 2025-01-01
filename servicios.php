<?php
require_once "./models/servicio.php";

$servicio = new Servicio();

$servicios = $servicio->getAll(); ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once "./layout/meta.html" ?>

    <title>Electrocopper Riojas - Servicios</title>

    <link rel="stylesheet" href="./assets/styles/servicios.css" />
  </head>

  <body>
    <?php require_once "./layout/header.html" ?>

    <section class="s-1">
      <h1 class="title">Servicios</h1>
    </section>

    <section class="s-2">
      <ul>
        <?php foreach ($servicios as $item): ?>
        <li>
          <div class="service">
            <img
              src="images/services/<?= htmlspecialchars($item['imagen']); ?>"
              alt="<?= htmlspecialchars($item['nombre']); ?>"
            />
            <h4 class="title">
              <?= htmlspecialchars($item['nombre']); ?>
            </h4>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section class="s-2">
      <ul>
        <li>
          <div class="service">
            <img src="images/services/service-1.jpeg" alt="Servicio 1" />

            <h4 class="title">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime,
              saepe.
            </h4>
          </div>
        </li>
        <li>
          <div class="service">
            <img src="images/services/service-2.jpg" alt="Servicio 1" />

            <h4 class="title">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime,
              saepe.
            </h4>
          </div>
        </li>
        <li>
          <div class="service">
            <img src="images/services/service-1.jpeg" alt="Servicio 1" />

            <h4 class="title">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime,
              saepe.
            </h4>
          </div>
        </li>
        <li>
          <div class="service">
            <img src="images/services/service-2.jpg" alt="Servicio 1" />

            <h4 class="title">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime,
              saepe.
            </h4>
          </div>
        </li>
        <li>
          <div class="service">
            <img src="images/services/service-1.jpeg" alt="Servicio 1" />

            <h4 class="title">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime,
              saepe.
            </h4>
          </div>
        </li>
      </ul>
    </section>

    <ul class="services">
      <li class="service">
        <div>
          <img src="images/services/service-1.jpeg" alt="Servicio 1" />
        </div>

        <div>
          <h3 class="title">Servicio residencial</h3>
          <p class="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem,
            sequi.
          </p>

          <ul>
            <li>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque
                asperiores, earum ab odit tenetur nobis obcaecati quod. Ratione,
                enim exercitationem?
              </p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis,
                ipsum deserunt quod sequi magnam temporibus harum nobis esse
                soluta eligendi?
              </p>
            </li>
          </ul>
        </div>
      </li>

      <li class="service reverse">
        <div>
          <img src="images/services/service-2.jpg" alt="Servicio 2" />
        </div>

        <div>
          <h3 class="title">Servicio Comercial</h3>
          <p class="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem,
            sequi.
          </p>

          <ul>
            <li>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque
                asperiores, earum ab odit tenetur nobis obcaecati quod. Ratione,
                enim exercitationem?
              </p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
          </ul>
        </div>
      </li>

      <li class="service">
        <div>
          <img src="images/services/service-1.jpeg" alt="Servicio 1" />
        </div>

        <div>
          <h3 class="title">Servicio residencial</h3>
          <p class="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem,
            sequi.
          </p>

          <ul>
            <li>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque
                asperiores, earum ab odit tenetur nobis obcaecati quod. Ratione,
                enim exercitationem?
              </p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis,
                ipsum deserunt quod sequi magnam temporibus harum nobis esse
                soluta eligendi?
              </p>
            </li>
          </ul>
        </div>
      </li>

      <li class="service reverse">
        <div>
          <img src="images/services/service-2.jpg" alt="Servicio 2" />
        </div>

        <div>
          <h3 class="title">Servicio Comercial</h3>
          <p class="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem,
            sequi.
          </p>

          <ul>
            <li>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque
                asperiores, earum ab odit tenetur nobis obcaecati quod. Ratione,
                enim exercitationem?
              </p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
            <li>
              <p>Lorem ipsum dolor sit amet.</p>
            </li>
          </ul>
        </div>
      </li>
    </ul>

    <section class="s-3">
      <article class="card">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="icon"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
        </svg>

        <h4 class="title">Lighting Upgrades</h4>

        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
          voluptatum deserunt reprehenderit.
        </p>
      </article>
      <article class="card">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="icon"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
        </svg>

        <h4 class="title">Lighting Upgrades</h4>

        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
          voluptatum deserunt reprehenderit.
        </p>
      </article>
      <article class="card">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="icon"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
        </svg>

        <h4 class="title">Lighting Upgrades</h4>

        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
          voluptatum deserunt reprehenderit.
        </p>
      </article>
      <article class="card">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="icon"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
        </svg>

        <h4 class="title">Lighting Upgrades</h4>

        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
          voluptatum deserunt reprehenderit.
        </p>
      </article>
      <article class="card">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="icon"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
        </svg>

        <h4 class="title">Lighting Upgrades</h4>

        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
          voluptatum deserunt reprehenderit.
        </p>
      </article>
      <article class="card">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="icon"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
        </svg>

        <h4 class="title">Lighting Upgrades</h4>

        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
          voluptatum deserunt reprehenderit.
        </p>
      </article>
    </section>

    <?php require_once "./layout/footer.html" ?>
  </body>

  <script type="module" src="./assets/scripts/header.js"></script>
</html>
