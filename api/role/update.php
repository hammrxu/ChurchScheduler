<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Role.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $role = new Role($db);

  // Get raw Role data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $role->id = $data->id;
  $role->tname = $data->tname;

  // Update post
  if($role->update()) {
    echo json_encode(
      array('message' => 'Role Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Role Not Updated')
    );
  }

