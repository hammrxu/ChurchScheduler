<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Helper.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog helper object
  $helper = new Helper($db);

  // Get ID
  $helper->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $helper->read_single();

  // Create array
  $helper_arr = array(
    'id' => $helper->id,
    'tname' => $helper->tname,
    'tname_p' => $helper->tname_p,
    'email' => $helper->email,
    'notify' => $helper->notify,
    'last_edit' => $helper->last_edit
  );

  // Make JSON
  print_r(json_encode($helper_arr));
