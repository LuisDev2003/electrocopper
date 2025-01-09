<?php

session_start();

if (!isset($_SESSION["estado"]) || $_SESSION["estado"] === false) {
  header("Location: ./iniciar-sesion");

  exit();
}
