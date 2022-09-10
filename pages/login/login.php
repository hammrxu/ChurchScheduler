<?php
$error = null;
//sessions
ob_start();
session_start();

if (isset($_POST['submit'])) {
    $u_username = $_POST['u_username'];



    // connect db
    include "../../Config/db.php";

    if ($conn->connect_error) {
        echo "Failed to connect db" . $conn->connect_error;
        exit();
    }

    // form data sanitize
    $u_username = $conn->real_escape_string($u_username);
    $u_password = $conn->real_escape_string($_POST['u_password']);

    // Check if user exists
    $result_u_username = $conn->query("SELECT * FROM users WHERE u_username = '$u_username' LIMIT 1");
    $row_cnt_u_username = $result_u_username->num_rows;

    if ($row_cnt_u_username == 0) {
        // user not exists
        $error = "<p>User '" . $u_username . "' does not exists, please try again with other username. Or you want to Register</p>";
    } else {
        //get password in db
        $result_u_password = $conn->query("SELECT u_password FROM users WHERE u_username = '$u_username'");

        if ($result_u_password->num_rows > 0) {
            $data = $result_u_password->fetch_array();

            if (password_verify($u_password, $data['u_password'])) {
                // logged in
                $error =  "<p>you logged in</p>";
                // set sessions
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $u_username;
                // move to logged in pages
                header('location:../index.php');
                die;
            } else {
                // fail to login
                $error = "<p>The username and password does not match, please try again.</p>";
            }
        }
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | ChurchScheduler</title>
    <style>
        body {
            /* display: flex;
            justify-content: center;
            align-items: center; */
        }

        .entrance-wrap {
            /* display: flex;
            justify-content: center;
            align-items: center; */
        }

        .entrance caption {
            margin: 40px;
            padding: 20px;
            cursor: pointer;
            background-color: lightblue;
            border-radius: 5px;
        }

        .entrance-wrap form {
            border: 1px solid lightblue;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="entrance-wrap">
        <form method="POST" action="" class="entrance">
            <table border='0' align="center" cellpadding="5">
                <caption>Log in</caption>
                <tr>
                    <td align="right">*Username:</td>
                    <td><input type="text" name="u_username" requeired /></td>
                    <td>(length>=4)</td>
                </tr>
                <tr>
                    <td align="right">*Password:</td>
                    <td><input type="password" name="u_password" requeired /></td>
                    <td>(...)</td>
                </tr>

                <tr>
                    <td></td>
                    <td align="center" style="display:flex;justify-content:space-between;">
                        <a href='../registration/registration.php'>Registration</a>
                        <input type="Submit" name="submit" value="Login" required />
                    </td>

                    <td></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <?php
        echo $error;
        ?>
    </div>
</body>

</html>