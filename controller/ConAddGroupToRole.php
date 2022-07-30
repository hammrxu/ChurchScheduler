<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    
    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "insert into ct_role_group (group_id_fk,role_id_fk) values (".$request['group_id'].",". $request['role_id'].")";
    
    $result = $conn->query($sql);

?>