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
            echo "This account has been verified now. You are now logged in.";

            echo "Directing to log in page";


            ob_start();
            session_start();

            $get_verify = $conn->query("SELECT verified,u_username From users WHERE vkey ='$vkey' LIMIT 1");

            // set sessions
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            if ($get_verify->num_rows > 0) {
                $data = $get_verify->fetch_array();
                $_SESSION['verified'] = $data['verified'];
                $_SESSION['username'] = $data['u_username'];
            }


            // move to logged in pages
            header('location:../index.php');
            echo '<script>alert(' . $data['u_username'] . '"Welcome!")</script>';
            die;
        } else {
            echo $conn->error;
        }
    } else {
        echo "This account invalid or already verified";
    }
} else {
    die("process is stopped");
}
