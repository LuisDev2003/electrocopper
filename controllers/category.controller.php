<?php

require_once '../models/category.php';

if (isset($_POST['operacion'])) {

  $category = new Category();

  switch ($_POST['operacion']) {
    case 'get-menu': {
        echo json_encode($category->getMenu());
        break;
      }

    case 'get-all':{
      echo json_encode($category->getAll());
      break;
    }

    case 'get-by-id': {
      $data = [
        "categoria_id" => $_POST['categoria_id']
      ];

      echo json_encode($category->getById($data));
      break;
    }

    case 'create':{
      $data = [
        'nombre'  => $_POST['nombre'],
      ];

      echo json_encode($category->create($data));
      break;
    }

    case 'update':{
      $data = [
        'categoria_id'  => $_POST['categoria_id'],
        'nombre'        => $_POST['nombre'],
      ];

      echo json_encode($category->update($data));
      break;
    }

    case 'delete':{
      $data = [
        'categoria_id'  => $_POST['categoria_id'],
      ];

      echo json_encode($category->delete($data));
      break;
    }
    
    default:
    $operacion = $_POST['operacion'];
    echo "$operacion no implementado";
    
  }

}

?>