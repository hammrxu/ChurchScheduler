<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Group.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Group object
  $group = new Group($db);

  // Get raw Group data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $group->id = $data->id;

  // Delete Group
  if($group->delete()) {
    echo json_encode(
      array('message' => 'Group Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Group Not Deleted')
    );
  }

