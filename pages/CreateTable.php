<!-- db connection start-->
<?php
    include '../Config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Searching</title>
    <link href="../css/main.css" rel="stylesheet">
</head>
<body>

<!-- main table -->
<?php
    include '../components/main_table.php';
?>

<h1>Filter Searching</h1>

<!-- form collect filtering infos -->
<form class="custompad" action="FilterSearching.php" method="GET">
    <table class="filter_input_table" style="width:80%;" >
        <tr width="80%">
            <td>
                <span>customerNumber</span> 
                <input type="text" name="customerNumber">
            </td>
            <td>
                <span>customerName</span> 
                <input type="text" name="customerName">
            </td>
            <td>
                <span>contactLastName</span> 
                <input type="text" name="contactLastName">
            </td>
            <td>
                <span>contactFirstName</span> 
                <input type="text" name="contactFirstName">
            </td>
        </tr>
        <tr width="80%">
            <td>
                <span>phone</span> 
                <input type="text" name="phone">
            </td>
            <td>
                <span>addressLine1</span> 
                <input type="text" name="addressLine1">
            </td>
            <td>
                <span>addressLine2</span> 
                <input type="text" name="addressLine2">
            </td>
            <td>
                <span>state</span> 
                <input type="text" name="state">
            </td>
        </tr>
        <tr width="80%">
            <td>
                <span>postalCode</span> 
                <input type="text" name="postalCode">
            </td>
            <td>
                <span>country</span> 
                <input type="text" name="country">
            </td>
            <td>
                <span>city</span>
                <input type="text" name="city">
            </td>
            <td>
                <span>salesRepEmployeeNumber</span>
                <input type="text" name="salesRepEmployeeNumber">
            </td>
        </tr>
        <tr width="80%">
            <td>
                <span>creditLimit</span> 
                <input type="text" name="creditLimit">
            </td>
        </tr>
    </table>
    <!-- submit buttons -->
    <br>
    <button type=submit name="submit">Submit</button>
    <button type="reset" name="reset">Clear</button>
    <br>
</form>

<!--Some Text -->
<h2>Results will shown below:</h2>

<!-- Selection  -->
<?php
    $table = "customers";
    // $field = "customerNumber";
    $field = "customerNumber";
    /*
    Test samples
    customerNumber : 114                     succeed
    customerName: La Rochelle Gifts          failed, with space
    phone : 2125557818	                    succeed
    phone : 07-98 9555                      failed, with space
    */
    if($_GET['customerNumber']){
        $field = "customerNumber";
    }
    if($_GET['customerName']){
        $field = "customerName";
    }
    if($_GET['contactLastName']){
        $field = "contactLastName";
    }
    if($_GET['contactFirstName']){
        $field = "contactFirstName";
    }
    if($_GET['phone']){
        $field = "phone";
    }
    if($_GET['addressLine1']){
        $field = "addressLine1";
    }
    if($_GET['addressLine2']){
        $field = "addressLine2";
    }
    if($_GET['state']){
        $field = "state";
    }
    if($_GET['postalCode']){
        $field = "phone";
    }
    if($_GET['country']){
        $field = "country";
    }
    if($_GET['city']){
        $field = "city";
    }
    if($_GET['salesRepEmployeeNumber']){
        $field = "salesRepEmployeeNumber";
    }
    if($_GET['creditLimit']){
        $field = "creditLimit";
    }

    $sql = "SELECT * FROM {$table} WHERE {$field} IS NOT NULL ";
    if ($_GET[$field]) {
        $addSqlValue =  $_GET[$field];
        $addSqlName = $field;
        $sql .= "AND {$addSqlName} = {$addSqlValue}";
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='result_table' BORDER>";
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
        $result =  "Result: 0 result. Please try again with other searches.";
        echo $result;
    }
?>

<!-- functions -->
<?php
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    function resetToPage($page){
        echo "header(Location: $page);";
        echo "exit;"; // Location header is set, pointless to send HTML, stop the script
    }
?>

<!-- db connection close-->
<?php
    $conn->close();
?>


</body>
</html>