<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    $query_filed = $request['newrole'];

    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set the DELETE SQL data
    
    $sql = "insert into service_role (tname) values('".$query_filed."')";
    // echo $sql;
    $result = $conn->query($sql);

?>