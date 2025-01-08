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
    <title>Electrocopper Riojas</title>

    <style media="screen">
      *,
      *:before,
      *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      body {
        background-color: #080710;
      }

      form {
        height: fit-content;
        width: 400px;
        background-color: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
      }

      form * {
        font-family: "Poppins", sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
      }

      form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
      }

      label {
        display: block;
        margin-top: 16px;
        font-size: 16px;
        font-weight: 500;
      }

      input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
      }

      ::placeholder {
        color: #e5e5e5;
      }

      button {
        margin-top: 24px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
      }

      p {
        display: flex;
        align-items: center;
        width: fit-content;
        padding-inline: 12px;
        border-radius: 10px;
        font-weight: 500;
        height: 40px;
        background-color: #ef4444;
        color: #fef2f2;
      }
    </style>
  </head>

  <body>
    <form>
      <p style="display: none">Lorem, ipsum dolor.</p>

      <label>Correo</label>
      <input
        type="text"
        name="correo"
        placeholder="Correo"
        autocomplete="username"
      />

      <label>Contraseña</label>
      <input
        type="password"
        name="contraseña"
        placeholder="Contraseña"
        autocomplete="current-password"
      />

      <button>Iniciar sesión</button>
    </form>
  </body>

  <script>
    const $form = document.querySelector("form");
    const $formMessage = document.querySelector("p");

    $form.addEventListener("submit", (e) => {
      e.preventDefault();

      const formdata = new FormData($form);

      for (const field of formdata) {
        const [key, value] = field;

        if (value.trim() === "") {
          $formMessage.removeAttribute("style");
          $formMessage.textContent = `El campo "${key}" es requerido`;
          return;
        }
      }

      formdata.append("operacion", "login");

      fetch("../controllers/auth.controller.php", {
        method: "POST",
        body: formdata,
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          if (data.estado) {
            location.href = "./servicios.php";
          } else {
            $formMessage.removeAttribute("style");
            $formMessage.textContent = data.mensaje;
          }
        });
    });
  </script>
</html>
