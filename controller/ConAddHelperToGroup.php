<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    
    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "insert into ct_group_helper (helper_id_fk,group_id_fk) values (".$request['helper_id'].",". $request['group_id'].")";
    
    $result = $conn->query($sql);

?>