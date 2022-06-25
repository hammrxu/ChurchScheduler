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
    <title>Church Scheduler</title>
    <link href="../css/main.css" rel="stylesheet">

    </style>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        $(function(){
            //import static title table
            $("#main_table").load("../components/main_table.html");
        });
    </script>
</head>
<body>

<div id="main_table"></div>



<!-- TODO: 默认显示发布好的未来6个月的日期文字表，以及日期表上的服侍同工 -->
<div>主页默认显示发布好的未来6个月的日期文字表，以及日期表上的服侍同工，示例如下：</div>

<br><br><br>
<div>当前时间:2022-06-25</div>

<br><br>
<br>
<div>选择显示的月份：</div>
 <select name="schedules" id="schedule_select_list">
  <option value="">之前6个月</option>
  <option value="saab">未来6个月</option>
</select>

<br><br><br>
未来6个月服事表
<!-- 2022-06 -->
<table class="styled-table">
    <caption>Service Schedules 2022-06</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-06-05</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-06-12</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-06-19</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-06-26</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>

</table>
<!-- 2022-07 -->
<table class="styled-table">
    <caption>Service Schedules 2022-07</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-07-03</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-07-10</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-07-17</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-07-24</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-07-31</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>
</table>
<!-- 2022-08 -->
<table class="styled-table">
    <caption>Service Schedules 2022-08</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-08-07</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-08-14</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-08-21</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-08-28</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>

</table>
<!-- 2022-09 -->
<table class="styled-table">
    <caption>Service Schedules 2022-09</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-09-04</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-09-11</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-09-18</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-09-25</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>

</table>
<!-- 2022-10 -->
<table class="styled-table">
    <caption>Service Schedules 2022-10</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-10-02</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-10-09</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-10-16</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-10-23</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-10-30</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>

</table>
<!-- 2022-11 -->
<table class="styled-table">
    <caption>Service Schedules 2022-11</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-11-06</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-11-13</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-11-20</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-11-27</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>

</table>
<!-- 2022-12 -->
<table class="styled-table">
    <caption>Service Schedules 2022-12</caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>service1</th>
            <th>service2</th>
            <th>service3</th>
            <th>service4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2022-12-04</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-12-11</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-12-18</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
        <tr>
            <td>2022-12-25</td>
            <td>s1Team1</td>
            <td>s2Team3</td>
            <td>s3Heler4</td>
            <td>s4Helper2</td>
        </tr>
    </tbody>

</table>

<!-- show all table names in database table:customers -->
<?php
    // $table = "customers";
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // $sql = "SELECT * FROM $table";
    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     echo "<table class='sample_table' BORDER>";
    //         echo "<th>customerNumber</th>";
    //         echo "<th>customerName</th>";
    //         echo "<th>phone</th>";
    //         echo "<th>addressLine1</th>";
    //         echo "<th>addressLine2</th>";
    //         echo "<th>state</th>";
    //         echo "<th>postalCode</th>";
    //         echo "<th>country</th>";
    //         echo "<th>city</th>";
    //         echo "<th>salesRepEmployeeNumber</th>";
    //         echo "<th>creditLimit</th>";
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr><td>" . $row["customerNumber"] .
    //         "</td><td>" . $row["customerName"] .
    //         "</td><td>" . $row["phone"] .
    //         "</td><td>" . $row["addressLine1"] .
    //         "</td><td>" . $row["addressLine2"] .
    //         "</td><td>" . $row["state"] .
    //         "</td><td>" . $row["postalCode"] .
    //         "</td><td>" . $row["country"] .
    //         "</td><td>" . $row["city"] .
    //         "</td><td>" . $row["salesRepEmployeeNumber"] .
    //         "</td><td>" . $row["creditLimit"] .
    //             "</td></tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "0 result";
    //     $_POST = array();
    // }
?>

<!-- db connection close-->
<?php
    $conn->close();
?>
</body>

<script src="../js/main.js"></script>
</html>