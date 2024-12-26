<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once "./layout/meta.html" ?>

    <title>Electrocopper Riojas - Sobre nosotros</title>

    <link rel="stylesheet" href="./assets/styles/sobre-nosotros.css" />
  </head>
  <body>
    <?php require_once "./layout/header.html" ?>

    <section class="s-1">
      <h1 class="title">Sobre nosotros</h1>
    </section>

    <section class="s-2">
      <div>
        <h2 class="title">Company Profile</h2>

        <p class="description">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio
          repellendus reiciendis id totam vel, odit incidunt amet ab, accusamus,
          libero distinctio ducimus omnis maiores. Est natus porro nostrum
          delectus consequuntur?
        </p>
      </div>

      <div class="div">
        <div class="accolades">
          <h2 class="title">Accolades</h2>

          <div class="images">
            <img src="images/2015-award-free-img.png" alt="" />
            <img src="images/2015-award-free-img.png" alt="" />
            <img src="images/2015-award-free-img.png" alt="" />
          </div>
        </div>

        <div class="s-3">
          <div id="tabs" class="tab">
            <button data-tab-content="vision" class="tablinks active">
              Vision
            </button>
            <button data-tab-content="mission" class="tablinks">Mission</button>
            <button data-tab-content="values" class="tablinks">Values</button>
          </div>

          <div id="vision" class="tabcontent" style="display: block">
            <p>
              Vision - Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Tempore corporis amet maxime, ipsum nulla nemo omnis quae
              exercitationem quaerat dicta?
            </p>
          </div>

          <div id="mission" class="tabcontent">
            <p>
              Mision - Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Tempore corporis amet maxime, ipsum nulla nemo omnis quae
              exercitationem quaerat dicta?
            </p>
          </div>

          <div id="values" class="tabcontent">
            <p>
              Values - Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Tempore corporis amet maxime, ipsum nulla nemo omnis quae
              exercitationem quaerat dicta?
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="s-4">
      <div class="wrapper">
        <div>
          <h1 class="title">Have Queries?</h1>

          <p class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum
            veniam adipisci libero! Doloribus dolorem necessitatibus sit
            architecto omnis voluptatibus minus.
          </p>
        </div>

        <a href="#" class="button">
          <span>Contact us</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 7l5 5l-5 5" />
            <path d="M13 7l5 5l-5 5" />
          </svg>
        </a>
      </div>
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
