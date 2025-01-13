<?php

session_start();

if (isset($_SESSION["estado"]) && $_SESSION["estado"] === true) {
  header("Location: ./servicios");
  exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel administrativo</title>

  <link rel="stylesheet" href="./styles/iniciar-sesion.css" />
</head>

<body>
  <form>
    <p style="display: none"></p>

    <label>Correo</label>
    <input
      type="text"
      name="correo"
      placeholder="Correo"
      autocomplete="username" />

    <label>Contraseña</label>
    <input
      type="password"
      name="contraseña"
      placeholder="Contraseña"
      autocomplete="current-password" />

    <button>Iniciar sesión</button>
  </form>
</body>

<script src="./scripts/iniciar-sesion.js"></script>

</html>
