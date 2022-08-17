<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Group.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog group object
  $group = new Group($db);

  // Blog group query
  $result = $group->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any groups
  if($num > 0) {
    // group array
    $group_arr = array();
    // $group_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $group_item = array(
        'id' => $id,
        'tname' => $tname,
        'last_edit' => $last_edit,
      );

      // Push to "data"
      array_push($group_arr, $group_item);
      // array_push($group_arr['data'], $group_item);
    }

    // Turn to JSON & output
    echo json_encode($group_arr);

  } else {
    // No Groups
    echo json_encode(
      array('message' => 'No Groups Found')
    );
  }
