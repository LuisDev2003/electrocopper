<?php
require_once "./models/servicio.php";

$servicio = new Servicio();

$servicios = $servicio->getAll(); ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electrocopper Riojas</title>

    <link rel="stylesheet" href="./assets/styles/global.css" />
    <link rel="stylesheet" href="./assets/styles/single.css" />
  </head>

  <body>
    <div class="background"></div>

    <header id="header" class="header">
      <div class="wrapper">
        <div class="logo">
          <img
            src="images/cropped-ELECTROCOPPER-logo-web_page-0001-1.jpg"
            alt=""
            height="48"
          />
        </div>

        <div class="navegation">
          <button
            id="button-toggle-menu"
            type="button"
            aria-label="Mostrar menú"
            data-status="close"
            class="button"
          >
            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="open"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 6l16 0" />
              <path d="M4 12l16 0" />
              <path d="M4 18l16 0" />
            </svg>

            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="close"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>
          </button>

          <nav id="nav-menu" class="menu">
            <a href="./#servicios" class="item">Servicios</a>
            <a href="./#sobre-nosotros" class="item">Sobre nosotros</a>
            <a href="./#contactos" class="item">Contactos</a>
            <a href="./#reseñas" class="item">Reseñas</a>
          </nav>
        </div>

        <div class="contact">
          <a
            href="https://api.whatsapp.com/send?phone=604982792"
            class="button"
            style="--bp: -59px -8.85px"
          >
            <span class="sr-only">Whatsapp</span>
          </a>
        </div>
      </div>
    </header>

    <aside id="sidebar-menu" class="sidebar">
      <ul class="menu">
        <li>
          <a href="./#servicios" class="item">Servicios</a>
        </li>
        <li>
          <a href="./#sobre-nosotros" class="item">Sobre nosotros</a>
        </li>
        <li>
          <a href="./#contactos" class="item">Contactos</a>
        </li>
        <li>
          <a href="./#reseñas" class="item">Reseñas</a>
        </li>
      </ul>
    </aside>

    <main class="main">
      <section id="servicios" class="services">
        <ul>
          <?php foreach ($servicios as $item): ?>
          <li>
            <div class="service">
              <img src="images/services/<?= htmlspecialchars($item['imagen'] ?? ""); ?>"
              alt="<?= htmlspecialchars($item['nombre']); ?>" class="image" />
              <h4 class="service-name">
                <?= htmlspecialchars($item['nombre']); ?>
              </h4>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </section>

      <section id="sobre-nosotros">
        <section class="about-us-1">
          <h2 class="title">Quienes somos…</h2>

          <p class="description">
            Somos una empresa que se desarrolla en el mercado español,
            especialistas en instalaciones eléctricas domiciliarias e
            industriales, automatizamos tus instalaciones eléctricas, reformamos
            pisos en forma general. Nos enfocamos en la satisfacción del cliente
            para lo cual contamos con una amplia experiencia en la ejecución de
            proyectos caracterizándonos por ejecutar los trabajos a tiempo
            pactado.
          </p>
        </section>

        <section class="about-us-2">
          <div id="tabs" class="tab">
            <button data-tab-content="vision" class="tablinks active">
              Visión
            </button>
            <button data-tab-content="mission" class="tablinks">Missión</button>
          </div>

          <div id="vision" class="tabcontent" style="--br: 0; display: block">
            <p>
              Electrocopper Riojas se proyecta en la inserción del mercado
              laboral comprometido a ser uno de los mejores en el rubro de
              electricidad, desarrollando trabajos altamente conceptuados y con
              tecnología de punta proporcionando asesoramiento y consultoría
              experta para la toma de decisiones en cuanto a sistemas de
              electrificación, automatización y domótica.
            </p>
          </div>

          <div id="mission" class="tabcontent" style="--br: 10px">
            <p>
              Electrocopper Riojas tiene la misión de brindar un trabajo de
              calidad y seguridad a nuestros clientes, con la intervención del
              personal adecuado y utilizando la innovación tecnológica en
              sistema de electricidad alcanzando la satisfacción y confort de
              quienes nos eligen.
            </p>
          </div>
        </section>

        <section class="about-us-3">
          <h2 class="title">¿Por qué elegirnos?</h2>

          <ol>
            <li>
              <p>Porque contamos con la experiencia y capacidad requerida</p>
            </li>
            <li>
              <p>
                Porque realizamos seguimiento a nuestros clientes y proyectos
                después de haber finalizado los trabajos.
              </p>
            </li>
            <li>
              <p>
                Porque nos adecuamos a la necesidad y al presupuesto de cada
                cliente
              </p>
            </li>
            <li>
              <p>
                Porque realizamos un trabajo con calidad y seguridad aplicando
                la mejora continua.
              </p>
            </li>
          </ol>
        </section>
      </section>

      <section id="contactos">
        <section class="contact-s-1">
          <h2 class="title">Contactos</h2>

          <ul>
            <li>
              <strong>Correo: </strong>
              <span>Electrocopper23@gmail.com</span>
            </li>

            <li>
              <strong>Teléfono: </strong>
              <span>+34604982793 | +34642916010</span>
            </li>

            <li>
              <strong>Dirección: </strong>
              <span>Calle de san fidel 54 – piso 1C - Madrid</span>
            </li>

            <li>
              <strong>Redes Sociales: </strong>
              <div class="social-media">
                <a
                  href="https://www.facebook.com/profile.php?id=61556652903051"
                  class="item"
                  style="--bp: -8px -8.85px"
                >
                  <span class="sr-only">Facebook</span>
                </a>

                <a
                  href="https://api.whatsapp.com/send?phone=604982792"
                  class="item"
                  style="--bp: -59px -8.85px"
                >
                  <span class="sr-only">Whatsapp</span>
                </a>

                <a href="#" class="item" style="--bp: -59px -57px">
                  <span class="sr-only">Instagram</span>
                </a>
              </div>
            </li>
          </ul>
        </section>

        <section class="contact-s-2">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.1976876039835!2d-3.640015025195772!3d40.42662128925557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422f685502732f%3A0xf385b3a8c844dc5a!2sC%2F%20de%20San%20Fidel%2C%2054%2C%20Cdad.%20Lineal%2C%2028017%20Madrid%2C%20Espa%C3%B1a!5e0!3m2!1ses-419!2spe!4v1735563542536!5m2!1ses-419!2spe"
            loading="lazy"
            border
          ></iframe>
        </section>
      </section>

      <section id="reseñas" class="reviews">
        <h2 class="title">Reseñas</h2>

        <form class="form">
          <div class="wrapper">
            <input
              type="text"
              name="nombre"
              placeholder="Nombre"
              class="input"
            />
            <textarea
              name="comentario"
              placeholder="Escríbanos una reseña"
              class="textarea"
            ></textarea>
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
              class="icon"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10 14l11 -11" />
              <path
                d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"
              />
            </svg>
            Comentar
          </button>
        </form>

        <ul>
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
    </main>

    <footer id="footer">
      <div class="footer">
        <div class="div-1">
          <img
            src="./images/cropped-ELECTROCOPPER-logo-web_page-0001-1.jpg"
            alt="Logo"
            height="145"
            class="logo"
          />

          <p class="description">
            Electricistas calificados con varios años de experiencia en la
            industria, capaces de manejar una amplia gama de proyectos y
            reparaciones eléctricas. Conocedores de normas de seguridad,
            comprometidos con la entrega de un trabajo de calidad.
          </p>
        </div>

        <div class="navegation">
          <h3 class="title">Links</h3>

          <nav>
            <a href="./">Inicio</a>
            <a href="./sobre-nosotros">Sobre nosotros</a>
            <a href="./servicios">Servicios</a>
            <a href="./faq">FAQ</a>
            <a href="./contactos">Contactos</a>
          </nav>
        </div>

        <div class="social-media">
          <a
            href="https://www.facebook.com/profile.php?id=61556652903051"
            class="item"
            style="--bp: -8px -8.85px"
          >
            <span class="sr-only">Facebook</span>
          </a>

          <a
            href="https://api.whatsapp.com/send?phone=604982792"
            class="item"
            style="--bp: -59px -8.85px"
          >
            <span class="sr-only">Whatsapp</span>
          </a>

          <a href="#" class="item" style="--bp: -59px -57px">
            <span class="sr-only">Instagram</span>
          </a>
        </div>
      </div>
    </footer>
  </body>

  <script>
    const buttonOpenMenu = document.querySelector("#button-toggle-menu");
    const sidebarMenu = document.querySelector("#sidebar-menu");

    function toggleStatusMenu() {
      const status = buttonOpenMenu.dataset.status;

      if (status === "open") {
        buttonOpenMenu.dataset.status = "close";

        sidebarMenu.classList.remove("open");
      } else {
        buttonOpenMenu.dataset.status = "open";

        sidebarMenu.classList.add("open");
      }
    }

    buttonOpenMenu.addEventListener("click", toggleStatusMenu);
  </script>

  <script>
    const tabs = document.querySelectorAll("#tabs > button");

    tabs.forEach((tab) => {
      tab.addEventListener("click", (event) => {
        tabEvent(event);
      });
    });

    function tabEvent(event) {
      const id = event.target.dataset.tabContent;
      const tabContent = document.querySelectorAll(".tabcontent");

      for (let i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
      }

      const tabLinks = document.querySelectorAll(".tablinks");

      for (let i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace(" active", "");
      }

      document.getElementById(id).style.display = "block";
      event.currentTarget.className += " active";
    }
  </script>
</html>
