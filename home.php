<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electrocopper Riojas</title>

    <?php require_once "./layouts/meta.php" ?>

    <link rel="shortcut icon" href="./images/logo.png" type="image/png" />

    <link rel="stylesheet" href="./styles/main.css" />
  </head>

  <body>
    <?php require_once "./layouts/header.php" ?>

    <main class="main">
      <?php require_once "./layouts/hero.php" ?>

      <?php require_once "./layouts/services.php" ?>

      <?php require_once "./layouts/about-us.php" ?>

      <?php require_once "./layouts/contact.php" ?>

      <?php require_once "./layouts/reviews.php" ?>
    </main>

    <?php require_once "./layouts/footer.php" ?>
  </body>

  <script type="module" src="./scripts/header.js"></script>
  <script type="module" src="./scripts/main.js"></script>
</html>
