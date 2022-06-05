<!DOCTYPE html>
<htm    l lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
    <style type="text/css">
        .file_preview-table td {
        text-align: center;
        /* width:150px; */
        }
    </style>
</head>
<body>
    <?php
    
    include "Config/database_map.php";
    $sql = 'SELECT u.file_name, u.uploaded_on, u.FileID FROM upload_files as u';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='file_preview-table' BORDER>";
        echo "<th>文件名</th>";
        echo "<th>最近修改日期</th>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$row[file_name]</td>";
            $uploaded = substr($row['uploaded_on'],0,8);
            echo "<td>$uploaded</td>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>

    <form action="#" method="GET">
        <span>First Number</span><br>
        <input type="text" name="num1" id="num1"><br>
        <button type="reset">Clear</button>
        <button type="submit">Submit</button>
    </form>
    <?php

    echo $_GET['num1'];

    ?>

</body>
</html>