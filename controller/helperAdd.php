<?php
// 3. need to be loggined in order to perform actions
session_start();
if (isset($_SESSION['username'])) {
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    include "../Config/db.php";
    //1. Use is_set() and other variable limits(for example, not null for name)
    if (isset($request['newhelper']) && $request['newhelper'] != "") {
        $name = $request['newhelper'];
    }
    if (isset($request['newhelper_p'])) {
        $name_p = $request['newhelper_p'];
    }
    //1. Other constrains will set at front end JS steps before submiting. for example, email must end with @edu.comWz`
    if (isset($request['email']) && $request['email'] != "") {
        // at least 62 chars length
        $email = $request['email'];
    }
    if (isset($request['notify']) && $request['notify'] != "") {
        $notify = $request['notify'];
    }

    // echo $sql;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //5. good idea to use Prepared Statments to avoid SQL injection
    $sql = "insert into service_helper (tname, email,notify) values(?,?,?)";
    $stmt = mysqli_stmt_init($stmt, $sql);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Error";
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $notify);
        mysqli_stmt_execute($stmt);
    }
    //2. close the database connection.
    exit();
} else {
    echo "You do not have the right to do the process";
}
