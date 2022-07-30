<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    $id = $request['idvalue'];
    $newName =  $request['newhelper'];



    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "update service_helper set tname = '$newName' where id = $id";
    // echo $sql;
    $result = $conn->query($sql);
?>