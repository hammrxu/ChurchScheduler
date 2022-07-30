<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    $query_filed = $request['id'];

    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set the DELETE SQL data
    $sql = "delete from service_group where id ='".$query_filed."'";

    $result = $conn->query($sql);
?>