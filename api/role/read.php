<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Role.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Role object
  $role = new Role($db);

  // Blog Role query
  $result = $role->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any Roles
  if($num > 0) {
    // role array
    $role_arr = array();
    // $role_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $role_item = array(
        'id' => $id,
        'tname' => $tname,
        // 'last_edit' => $last_edit,
      );

      // Push to "data"
      array_push($role_arr, $role_item);
      // array_push($role_arr['data'], $role_item);
    }

    // Turn to JSON & output
    echo json_encode($role_arr);

  } else {
    // No Roles
    echo json_encode(
      array('message' => 'No Roles Found')
    );
  }
