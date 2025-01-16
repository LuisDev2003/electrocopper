<?php 

require_once '../models/forms.php';


if(isset($_POST['operacion'])){

  $forms = new Forms();

  switch ($_POST['operacion']) {
    case 'getAll':{
      echo json_encode($forms->getAll());
      break;
    }

    case 'create':{
      $data = [
        'nombre'                 => $_POST['nombre'],
        'correo'                  => $_POST['correo'],
        'mensaje'                 => $_POST['mensaje']
      ];

      echo json_encode($forms->create($data));
      break;
    }

    case 'update':{

      $data = [
        'formulario_contacto_id'  => $_POST['formulario_contacto_id'],
        'nombre'                  => $_POST['nombre'],
        'correo'                  => $_POST['correo'],
        'mensaje'                 => $_POST['mensaje']
      ];


      echo json_encode($forms->update($data));
      break;
    }

    case 'delete':{
      $data = [
        'formulario_contacto_id'  => $_POST['formulario_contacto_id'],
      ];


      echo json_encode($forms->delete($data));
      break;
    }
    
    default:
    $operacion = $_POST['operacion'];
    echo "$operacion no implementado";
  };

};

?>