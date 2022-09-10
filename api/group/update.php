<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Group.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $group = new Group($db);

  // Get raw group data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $group->id = $data->id;
  $group->tname = $data->tname;

  // Update post
  if($group->update()) {
    echo json_encode(
      array('message' => 'Group Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Group Not Updated')
    );
  }

