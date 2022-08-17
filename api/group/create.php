<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Group.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Group object
  $group = new Group($db);

  // Get raw group data
  $data = json_decode(file_get_contents("php://input"));

  $group->id = $data->id;
  $group->tname = $data->tname;
  $group->last_edit = $data->last_edit;

  // Create group
  if($group->create()) {
    echo json_encode(
      array('message' => 'Group Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Group Not Created')
    );
  }

