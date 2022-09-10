<?php
$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
include "../../Config/db.php";
$sql = '';
foreach ($request['helper_select'] as $helper) {
    $helper_explode = explode('|', $helper);
    // $helper_explode[0] = helper['id'] , $helper_explode[1] = helper['tname'] , $helper_explode[2] = role['tname'], $helper_explode[3] = sunday['sunday']
    $sql .= "insert into service_schedule (sunday_fk,helper_id_fk) values('" . $helper_explode[3] . "',NOW())";
}
foreach ($request['group_select'] as $group) {
    $group_explode = explode('|', $group);
    // $group_explode[0] = group['id'] , $group_explode[1] = group['tname'] , $group_explode[2] = role['tname'], $group_explode[3] = sunday['sunday']
}

// echo $sql;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// if


$result = $conn->query($sql);
