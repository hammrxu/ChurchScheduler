<?php
require_once "../Config/db.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Scheduler</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/Scheduling.css" rel="stylesheet">
    <link href="../css/nav.css" rel="stylesheet">


    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../components/add_form.js"></script>
    <style>
        .wrap {
            padding: 5px;
            border: 1px solid orange;
            font-size: medium;
        }

        .wrap label,
        .wrap input,
        .wrap span,
        .wrap button {
            margin: 5px;
        }

        #custom-wrap input {
            width: auto !important;
        }
    </style>
</head>

<body>
    <?php
    require_once("../components/navBar.php");
    ?>
    <iframe name="dummyframe" style="display:none;"></iframe>
    <?php
    //custom 
    if (isset($_POST['custom'])) {
        //empty first
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = '';
        $sql .= "DELETE FROM ct_role_group WHERE role_id_fk between 0 and 200; ";
        $sql .= "DELETE FROM ct_group_helper WHERE group_id_fk between 0 and 200; ";
        $sql .= "DELETE FROM ct_role_helper  WHERE role_id_fk between 0 and 200; ";
        $sql .= "DELETE FROM service_group WHERE id between 0 and 200; ";
        $sql .= "DELETE FROM service_role WHERE id between 0 and 200; ";
        $sql .= "DELETE FROM service_helper WHERE id between 0 and 200; ";
        // reset all tables increment from 1
        $sql .= "ALTER TABLE ct_role_group AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE ct_group_helper AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE ct_role_helper AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE service_group AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE service_role AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE service_helper AUTO_INCREMENT = 1; ";
        $result = mysqli_multi_query($conn, $sql);


        //then do something
        $group_c = $_POST['groups'];
        $role_c = $_POST['roles'];
        $helper_c = $_POST['helpers'];

        $query = '';
        $array = array();
        //add group into table
        if ($group_c >= 1) {
            for ($i = 1; $i <= $group_c; $i++) {
                $array[$i - 1] = 'Group ' . $i;
            }
            // row by row
            for ($i = 0; $i < $arrlength; $i++) {
                $index = $i + 1;
                $value = $array[$i];
                // echo $index.' : '.$value;
                $query .= "INSERT INTO service_group(id,tname) VALUES ('" . $index . "','" . $value . "'); ";
            }
            mysqli_multi_query($conn, $query);
        }

        if ($role_c >= 1) {
            for ($i = 1; $i <= $role_c; $i++) {
                $array[$i - 1] = 'Role ' . $i;
            }
            // row by row
            for ($i = 0; $i < $arrlength; $i++) {
                $index = $i + 1;
                $value = $array[$i];
                // echo $index.' : '.$value;
                $query .= "INSERT INTO service_role(id,tname) VALUES ('" . $index . "','" . $value . "'); ";
            }
            mysqli_multi_query($conn, $query);
        }

        if ($helper_c >= 1) {
            for ($i = 1; $i <= $helper_c; $i++) {
                $array[$i - 1] = 'Helper ' . $i;
            }
            // row by row
            for ($i = 0; $i < $arrlength; $i++) {
                $index = $i + 1;
                $value = $array[$i];
                // echo $index.' : '.$value;
                $query .= "INSERT INTO service_helper(id,tname) VALUES ('" . $index . "','" . $value . "'); ";
            }
            mysqli_multi_query($conn, $query);
        }
        $message =  "Tables Created: " . $role_c . " Roles, " . $group_c . " Groups, " . $helper_c . " Helpers ";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    //reset
    if (isset($_POST['reset'])) {
        //--------------------------
        //add group into table
        $query = '';
        // json file name
        $filename = "../data/group.json";
        // Read the JSON file in PHP
        $data = file_get_contents($filename);
        // Convert the JSON String into PHP Array
        $array = json_decode($data, true);
        // Extracting row by row
        foreach ($array as $row) {
            // Database query to insert data 
            // into database Make Multiple 
            // Insert Query 
            $query .= "INSERT INTO service_group(id,tname) VALUES ('" . $row["id"] . "','" . $row["tname"] . "'); ";
        }
        // mysqli_multi_query($conn, $query);

        //--------------------------
        //add role into table
        // json file name
        $filename = "../data/role.json";
        // Read the JSON file in PHP
        $data = file_get_contents($filename);
        // Convert the JSON String into PHP Array
        $array = json_decode($data, true);
        // Extracting row by row
        foreach ($array as $row) {
            // Database query to insert data 
            // into database Make Multiple 
            // Insert Query 
            $query .= "INSERT INTO service_role(id,tname) VALUES ('" . $row["id"] . "','" . $row["tname"] . "'); ";
        }
        // mysqli_multi_query($conn, $query);

        //--------------------------
        //add helper into table
        // json file name
        $filename = "../data/helper.json";
        // Read the JSON file in PHP
        $data = file_get_contents($filename);
        // Convert the JSON String into PHP Array
        $array = json_decode($data, true);
        // Extracting row by row
        foreach ($array as $row) {
            // Database query to insert data 
            // into database Make Multiple 
            // Insert Query 
            $query .= "INSERT INTO service_helper(id,tname) VALUES ('" . $row["id"] . "','" . $row["tname"] . "'); ";
        }
        mysqli_multi_query($conn, $query);

        $message = "Tables Now Reset";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    //empty  
    if (isset($_POST['empty'])) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = '';
        $sql .= "DELETE FROM ct_role_group WHERE role_id_fk between 0 and 200; ";
        $sql .= "DELETE FROM ct_group_helper WHERE group_id_fk between 0 and 200; ";
        $sql .= "DELETE FROM ct_role_helper  WHERE role_id_fk between 0 and 200; ";
        $sql .= "DELETE FROM service_group WHERE id between 0 and 200; ";
        $sql .= "DELETE FROM service_role WHERE id between 0 and 200; ";
        $sql .= "DELETE FROM service_helper WHERE id between 0 and 200; ";
        // reset all tables increment from 1
        $sql .= "ALTER TABLE ct_role_group AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE ct_group_helper AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE ct_role_helper AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE service_group AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE service_role AUTO_INCREMENT = 1; ";
        $sql .= "ALTER TABLE service_helper AUTO_INCREMENT = 1; ";
        $result = mysqli_multi_query($conn, $sql);

        $message = "Tables Now Empty";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    ?>
    <form method="post">
        <div id="wrap1" class="wrap">
            <button type="submit" name="reset" value="reset">Reset</button><span>Reset All Data To Demo Data</span><br />
        </div>
        <div id="wrap2" class="wrap">
            <button type="submit" name="empty" value="empty">Empty</button><span>Empty All Data </span><br />
        </div>

        <div id="custom-wrap" class="wrap">
            <form method="post">
                <label for="">Roles:</label><br /><input type="text" , name="roles" ,id="roles"><br />
                <label for="">Groups:</label><br /><input type="text" , name="groups" ,id="groups"><br />
                <label for="">Helpers:</label><br /><input type="text" , name="helpers" ,id="helpers"><br />
                <button type="submit" name="custom" value="empty">Custom</button><br />
            </form>
        </div>

    </form>

    <!-- <button>Save</button> All Data To Local -->
    <pre>
Helper 1 - Helper 8
Group  1 - Group  3
Role   1 - Role   4 
</pre>
</body>

</html>