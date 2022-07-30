<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    $query_filed = $request['id'];
    $search = array("'","&",'"',"|","!","#","$","@","%","^","*");
    $replace = array("\'","\&",'\"',"\|","\!","\#","\$","\@","%","\^","*");
    $newName = str_replace($search,$replace,$request['newName']);
    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set the DELETE SQL data
    // $sql = "update service_helper set tname ='".$newName."' where tname ='".$query_filed."'     ";
    $sql = "update service_helper set tname ='".$newName."' where id = '".$query_filed."'";
    // echo $sql;
    $result = $conn->query($sql);
?>