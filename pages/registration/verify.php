<?php
if (isset($_GET['vkey'])) {
    // process verification
    $vkey = $_GET['vkey'];

    // connect db
    include "../../Config/db.php";

    $resultSet = $conn->query("SELECT verified,vkey From users WHERE verified=0 AND vkey = '$vkey' LIMIT 1");

    if ($resultSet->num_rows == 1) {
        //validate the email
        $update = $conn->query("UPDATE users SET verified =1 where vkey ='$vkey' LIMIT 1");

        if ($update) {
            echo "This account has been verified now. You may now login.";
        } else {
            echo $conn->error;
        }
    } else {
        echo "This account invalid or already verified";
    }
} else {
    die("process is stopped");
}