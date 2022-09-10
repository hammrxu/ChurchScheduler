<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Group.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Group object
  $group = new Group($db);

  // Get ID
  $group->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get group
  $group->read_single();

  // Create array
  $group = array(
    'id' => $group->id,
    'tname' => $group->tname,
    'last_edit' => $group->last_edit,
  );

  // Make JSON
  print_r(json_encode($group_arr));