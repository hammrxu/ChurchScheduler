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
            $("#main_taible").load("../components/main_table.html");
        });
    </script>
</head>
<body>
    
<?php
    $conn->close();
?>
</body>

<script src="../js/main.js"></script>
</html>