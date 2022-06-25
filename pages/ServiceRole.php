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
    <div>Result:
        <table class="styled-table">
            <caption>Service Role Management</caption>
            <thead>
                <tr>
                    <td>Role</td>
                    <td>Manage</td>
                </tr>
            </thead>
            <?php
                $result_filed = "name";
                $table = "service_role";
                $sql = "SELECT {$result_filed} FROM {$table}";
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"] . "<td><button class='delete_role'>-</button><button class='edit_role_name'>edit</button></td>"  .  "</td></tr>";
                    }
                }
            ?>
        </table>
    </div>
<?php
    
    $conn->close();
?>
</body>

<script src="../js/main.js"></script>
<script>
    // $( "<div>Result:</div>" )
    //     .addClass( "my-div" )
    //     .attr('id', "result")
    //     .on({
    //     touchstart: function( event ) {
    //     // Do something
    //     }
    // })
    // .appendTo( "body" );

</script>
</html>