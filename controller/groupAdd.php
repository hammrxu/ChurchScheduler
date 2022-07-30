<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    $query_filed = $request['newgroup'];

    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "insert into service_group (tname) values('".$query_filed."')";

    $result = $conn->query($sql);
?>