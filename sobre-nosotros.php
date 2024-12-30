<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once "./layout/meta.html" ?>

    <title>Electrocopper Riojas - Sobre nosotros</title>

    <link rel="stylesheet" href="./assets/styles/sobre-nosotros.css" />
  </head>
  <body>
    <?php require_once "./layout/header.html" ?>

    <section class="s-2">
      <h2 class="title">Quienes somos…</h2>

      <p class="description">
        Somos una empresa que se desarrolla en el mercado español, especialistas
        en instalaciones eléctricas domiciliarias e industriales, automatizamos
        tus instalaciones eléctricas, reformamos pisos en forma general. Nos
        enfocamos en la satisfacción del cliente para lo cual contamos con una
        amplia experiencia en la ejecución de proyectos caracterizándonos por
        ejecutar los trabajos a tiempo pactado.
      </p>
    </section>

    <section class="s-3">
      <div id="tabs" class="tab">
        <button data-tab-content="vision" class="tablinks active">
          Visión
        </button>
        <button data-tab-content="mission" class="tablinks">Missión</button>
      </div>

      <div id="vision" class="tabcontent" style="--br: 0; display: block">
        <p>
          Electrocopper Riojas se proyecta en la inserción del mercado laboral
          comprometido a ser uno de los mejores en el rubro de electricidad,
          desarrollando trabajos altamente conceptuados y con tecnología de
          punta proporcionando asesoramiento y consultoría experta para la toma
          de decisiones en cuanto a sistemas de electrificación, automatización
          y domótica.
        </p>
      </div>

      <div id="mission" class="tabcontent" style="--br: 10px">
        <p>
          Electrocopper Riojas tiene la misión de brindar un trabajo de calidad
          y seguridad a nuestros clientes, con la intervención del personal
          adecuado y utilizando la innovación tecnológica en sistema de
          electricidad alcanzando la satisfacción y confort de quienes nos
          eligen.
        </p>
      </div>
    </section>

    <section class="s-4">
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
            Porque nos adecuamos a la necesidad y al presupuesto de cada cliente
          </p>
        </li>
        <li>
          <p>
            Porque realizamos un trabajo con calidad y seguridad aplicando la
            mejora continua.
          </p>
        </li>
      </ol>
    </section>

    <?php require_once "./layout/footer.html" ?>
  </body>

  <script type="module" src="./assets/scripts/header.js"></script>
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
