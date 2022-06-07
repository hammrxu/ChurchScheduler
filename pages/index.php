<!-- db connection start-->
<?php
include_once'../Config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice1</title>
    <link href="../css/main.css" rel="stylesheet">

    </style>
</head>
<body>

<!-- main table -->
<?php
    include_once '../components/main_table.php'
?>

<!-- show all table names in database table:customers -->
<?php
    $table = "customers";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='sample_table' BORDER>";
            echo "<th>customerNumber</th>";
            echo "<th>customerName</th>";
            echo "<th>phone</th>";
            echo "<th>addressLine1</th>";
            echo "<th>addressLine2</th>";
            echo "<th>state</th>";
            echo "<th>postalCode</th>";
            echo "<th>country</th>";
            echo "<th>city</th>";
            echo "<th>salesRepEmployeeNumber</th>";
            echo "<th>creditLimit</th>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["customerNumber"] .
            "</td><td>" . $row["customerName"] .
            "</td><td>" . $row["phone"] .
            "</td><td>" . $row["addressLine1"] .
            "</td><td>" . $row["addressLine2"] .
            "</td><td>" . $row["state"] .
            "</td><td>" . $row["postalCode"] .
            "</td><td>" . $row["country"] .
            "</td><td>" . $row["city"] .
            "</td><td>" . $row["salesRepEmployeeNumber"] .
            "</td><td>" . $row["creditLimit"] .
                "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 result";
        $_POST = array();
    }
?>

<!-- db connection close-->
<?php
    $conn->close();
?>
</body>
</html>