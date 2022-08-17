<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Helper.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $helper = new Helper($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $helper->id = $data->id;

  $helper->tname = $data->tname;

  $helper->tname_p = $data->tname_p;

  $helper->email = $data->email;

  $helper->notify = $data->notify;


  // Update post
  if($helper->update()) {
    echo json_encode(
      array('message' => 'Helper Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Helper not updated')
    );
  }
