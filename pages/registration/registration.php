<?php
$error = null;

// operating system...
function get_operating_system()
{
    $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $operating_system = 'Unknown Operating System';

    //Get the operating_system name
    if ($u_agent) {
        if (preg_match('/linux/i', $u_agent)) {
            $operating_system = 'Linux';
        } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
            $operating_system = 'Mac';
        } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
            $operating_system = 'Windows';
        } elseif (preg_match('/ubuntu/i', $u_agent)) {
            $operating_system = 'Ubuntu';
        } elseif (preg_match('/iphone/i', $u_agent)) {
            $operating_system = 'IPhone';
        } elseif (preg_match('/ipod/i', $u_agent)) {
            $operating_system = 'IPod';
        } elseif (preg_match('/ipad/i', $u_agent)) {
            $operating_system = 'IPad';
        } elseif (preg_match('/android/i', $u_agent)) {
            $operating_system = 'Android';
        } elseif (preg_match('/blackberry/i', $u_agent)) {
            $operating_system = 'Blackberry';
        } elseif (preg_match('/webos/i', $u_agent)) {
            $operating_system = 'Mobile';
        }
    } else {
        $operating_system = php_uname('s');
    }

    return $operating_system;
}

// operating syste...

if (isset($_POST['submit'])) {
    $u_username = $_POST['u_username'];
    $u_password = $_POST['u_password'];
    $u_password2 = $_POST['u_password2'];
    $email = $_POST['email'];



    // connect db
    include "../../Config/db.php";

    if ($conn->connect_error) {
        echo "Failed to connect db" . $conn->connect_error;
        exit();
    }

    // form data sanitize
    $u_username = $conn->real_escape_string($u_username);
    $u_password = $conn->real_escape_string($u_password);
    $u_password2 = $conn->real_escape_string($u_password2);
    $email = $conn->real_escape_string($email);

    // Check if user exists
    $result_u_username = $conn->query("SELECT * FROM users WHERE u_username = '$u_username' LIMIT 1");
    $row_cnt_u_username = $result_u_username->num_rows;

    // Check if email exists
    $result_email = $conn->query("SELECT * FROM users WHERE email = '$email' LIMIT 1");
    $row_cnt_email = $result_email->num_rows;


    if (strlen($u_username) < 4) {
        $error = "<p>Your username must be at least 4 characters";
    } elseif ($u_password2 != $u_password) {
        $error = "<p>Your passwords do not match";
    } elseif ($row_cnt_u_username == 1) {
        $error = "<p>user '" . $u_username . "' already exists, please use other username. Or you want to login";
    } elseif ($row_cnt_email == 1) {
        $error = "<p>email '" . $email . "'  already exists, please use other email address. Or you want to login";
    } else {
        // valid form

        // create vkey
        // $vkey = md5(time() . $u_username);
        $vkey = md5(time() . $u_username);

        // insert account into db
        // $u_password = md5($u_password);
        $hash = password_hash($u_password, PASSWORD_DEFAULT);
        $stmt = $conn->stmt_init();

        $sql = "insert into users (u_username, u_password,email,vkey) values(?,?,?,?)";


        if ($stmt->prepare($sql)) {
            $stmt->bind_param("ssss", $u_username, $hash, $email, $vkey);
            $insert = $stmt->execute();

            if ($insert) {
                //check whther windows system
                $systemInfo = get_operating_system();
                if ($systemInfo = 'Windows') {
                    echo "Due to windows system have different way to send email, this demo is still developing! Please click the link here that should send to your email :" . "<a href='./verify.php?vkey=$vkey'>Register Account</a>";
                } else {
                    // other systems, may send email successful
                    $to = $email;
                    $subject = "Email Verification";
                    $message = "<a href='http://localhost/pages/registration/verify.php?vkey=$vkey'>Register Account</a>";
                    $headers = "From: hammrxu@gmail.com" . "\r\n";
                    $headers .= "MIME-Version: 1.0" .  "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    if (mail($to, $subject, $message, $headers)) {
                        header('location:thankyou.php');
                    }
                }
            } else {
                echo $conn->error;
            }
        }
    }
}
// }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | ChurchScheduler</title>
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
                <caption>Register</caption>
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
                    <td align="right">*Re-Enter Password:</td>
                    <td><input type="password" name="u_password2" requeired /></td>
                    <td>(...)</td>
                </tr>
                <tr>
                    <td align="right">*Email Address:</td>
                    <td><input type="email" name="email" requeired /></td>
                    <td>(...)</td>
                </tr>
                <tr>
                    <td></td>
                    <td align="left" style="display:flex;justify-content:space-between;">
                        <a href='../login/login.php'>Login</a>
                        <input type="Submit" name="submit" value="Register" required />
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