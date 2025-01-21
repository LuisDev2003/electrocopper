<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Electrocopper Riojas</title>

  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/output.css">
</head>

<body>
  <?php require_once "./layouts/header.php" ?>

  <main class="my-8">
    <?php require_once "./layouts/budget/index.php" ?>
  </main>

  <?php require_once "./layouts/footer.php" ?>
</body>

<script type="module" src="./scripts/header.js"></script>
<script type="module" src="./scripts/budget.js"></script>

</html>
