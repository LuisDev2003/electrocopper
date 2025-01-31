<?php $name = $_GET['n'] ?: ''; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Electrocopper Riojas - <?= $name ?></title>

  <?php require_once "./layouts/meta.php" ?>


  <link rel="stylesheet" href="./styles/output.css">
</head>

<body>
  <?php require_once "./layouts/header/index.php" ?>

  <main>

    <?php require_once "./layouts/service.php" ?>

  </main>

  <?php require_once "./layouts/footer.php" ?>
</body>

<script type="module" src="./scripts/header.js"></script>

</html>
