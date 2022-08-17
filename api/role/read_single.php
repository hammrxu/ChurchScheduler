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

  // Get ID
  $role->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get Role
  $role->read_single();

  // Create array
  $role = array(
    'id' => $role->id,
    'tname' => $role->tname,
    'last_edit' => $role->last_edit,
  );

  // Make JSON
  print_r(json_encode($role_arr));