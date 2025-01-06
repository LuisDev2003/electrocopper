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
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
      }

      label:first-child {
        margin-top: 0px;
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
        margin-top: 50px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
      }
    </style>
  </head>

  <body>
    <form>
      <label>Correo</label>
      <input type="text" placeholder="Correo" autocomplete="username" />

      <label>Contraseña</label>
      <input
        type="password"
        placeholder="Contraseña"
        autocomplete="current-password"
      />

      <button>Iniciar sesión</button>
    </form>
  </body>
</html>
