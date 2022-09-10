<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Sundays.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog sunday object
  $sunday = new Sunday($db);

  // Blog sunday query
  $result = $sunday->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any sundays
  if($num > 0) {
    // sunday array
    $sunday_arr = array();
    // $sunday_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $sunday_item = array(
        'sunday' => $sunday
      );

      // Push to "data"
      array_push($sunday_arr, $sunday_item);
      // array_push($sunday_arr['data'], $sunday_item);
    }

    // Turn to JSON & output
    echo json_encode($sunday_arr);

  } else {
    // No Sunday
    echo json_encode(
      array('message' => 'No Sundays Found')
    );
  }
