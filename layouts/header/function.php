<?php
require_once dirname(__DIR__, 2) . "/models/category.php";


function getGroupedServices()
{
  $instance = new Category();
  $services = $instance->getMenu();

  $groupedServices = [];

  foreach ($services as $service) {
    $categoryId = $service['categoria'];
    $serviceName = $service['servicio'];

    if (!isset($groupedServices[$categoryId])) {
      $groupedServices[$categoryId] = [];
    }

    $groupedServices[$categoryId][] = $serviceName;
  }

  return $groupedServices;
}

function stringToSlug(string $string, string $prefix = "")
{
  $string = strtolower($string);

  $string = preg_replace(
    ['/á/', '/é/', '/í/', '/ó/', '/ú/', '/ü/', '/ñ/', '/Á/', '/É/', '/Í/', '/Ó/', '/Ú/', '/Ü/', '/Ñ/'],
    ['a', 'e', 'i', 'o', 'u', 'u', 'n', 'a', 'e', 'i', 'o', 'u', 'u', 'n'],
    $string
  );

  $string = preg_replace('/\s+/', '-', $string);

  $string = preg_replace('/[^a-z0-9-]/', '', $string);

  $string = trim($string, '-');

  return $prefix . $string;
}

$menu = getGroupedServices();

$mainMenu = [
  ["name" => "Inicio", "link" => $baseURL],
  ["name" => "Servicios", "link" => $baseURL . "servicios",],
  ["name" => "Sobre nosotros", "link" => $baseURL . "sobre-nosotros"],
  ["name" => "Nuestros clientes", "link" => $baseURL . "nuestros-clientes"],
  ["name" => "Contactos", "link" => $baseURL . "contactos"],
  ["name" => "Presupuesto", "link" => $baseURL . "presupuesto"],
  ["name" => "Reseñas", "link" => $baseURL . "reseñas"],
];
