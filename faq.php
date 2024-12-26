<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once "./layout/meta.html" ?>

    <title>Electrocopper Riojas - FAQ</title>

    <link rel="stylesheet" href="./assets/styles/faq.css" />
  </head>
  <body>
    <?php require_once "./layout/header.html" ?>

    <section class="s-1">
      <h1 class="title">FAQ</h1>
    </section>

    <section class="s-2">
      <h2 class="title">Have Questions?</h2>

      <p class="description">
        Aliquam suscipit felis a arcu laoreet congue. Habeo nemore appellantur
        eu usu putant adolescens consequuntur ei, mel tempor consulatu
        voluptaria. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Elit luctus nec ullamcorper mattis, pulvinar dapibus leo. It elit
        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Aliquam
        suscipit felis a arcu laoreet congue. Habeo putant adolescens
        consequuntur.
      </p>
    </section>

    <section class="s-3">
      <div class="question">
        <button class="accordion active">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
          quaerat.?
        </button>
        <div class="panel" style="display: block;">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
          </p>
        </div>

        <button class="accordion">Lorem ipsum dolor sit amet.?</button>
        <div class="panel">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
          </p>
        </div>

        <button class="accordion">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit.?
        </button>
        <div class="panel">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
          </p>
        </div>
      </div>

      <div>
        <img src="images/faq.jpg" alt="Faq image" />
      </div>
    </section>

    <?php require_once "./layout/footer.html" ?>
  </body>

  <script type="module" src="./assets/scripts/header.js"></script>
  <script>
    const acc = document.getElementsByClassName("accordion");

    for (let i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;

        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
</html>
