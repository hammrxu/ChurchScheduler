<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    $name = $request['newhelper'];
    $name_p = $request['newhelper_p'];
    $email = $request['email'];
    $notify = $request['notify'];

    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "insert into service_helper (tname, email,notify,last_edit) values('$name','$email',$notify,NOW())";
    echo $sql;
    $result = $conn->query($sql);

?>