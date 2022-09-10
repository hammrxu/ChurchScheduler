<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Role.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Role object
  $role = new Role($db);

  // Get raw Role data
  $data = json_decode(file_get_contents("php://input"));

  $role->id = $data->id;
  $role->tname = $data->tname;
  $role->last_edit = $data->last_edit;

  // Create role
  if($role->create()) {
    echo json_encode(
      array('message' => 'Role Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Role Not Created')
    );
  }

