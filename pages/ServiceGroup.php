<!-- db connection start-->
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

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../components/add_form.js"></script>
</head>

<body>
<?php
    require_once("../components/main_table.html");
?>
    <div>
        <span class="system"></span>
        <div id="manipulate_display"></div>
        <div id="show_add_instance">
        </div>
        <iframe name="dummyframe" style="display:none;"></iframe>
            <?php
                // different
                $table = "service_group"; 
                $sql = "SELECT id,tname FROM {$table} order by tname ASC"; 
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table class='styled-table'>
                                <caption style='text-transform: capitalize;'>service group management</caption>
                                <thead>
                                    <tr>
                                        <td>group</td>
                                        <td>manage</td>
                                        <td>helpers
                                        <td>add helper</td>
                                        <td>remove helper</td>
                                    </tr>
                                </thead>
                        ";
                    while ($row = $result->fetch_assoc()) {
                        $sql2 = "SELECT service_group.id,service_group.tname,ct_group_helper.helper_id_fk,service_helper.tname as hname FROM service_group LEFT JOIN ct_group_helper ON ct_group_helper.group_id_fk = service_group.id LEFT JOIN service_helper ON ct_group_helper.helper_id_fk = service_helper.id where service_group.id = ".$row['id'];
                        $result2 = $conn->query($sql2);
                        $nameList='';
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $nameList.=$row2['hname'];
                                $nameList.=", ";
                            }
                            $nameList = substr($nameList, 0, -2);
                        }
                            echo "
                                <tr>
                                    <td value=". $row['id'] . ">" . $row['tname'] . "</td>
                                    <td>
                                        <button class='delete_instance cap'>delete</button>
                                        <button class='edit_instance_name cap'>rename</button>
                                    </td>";
                                    //show helpers
                            echo "<td>".$nameList."</td>";
                            //add helper
                            echo "
                                    <td>
                                        <form action='../controller/ConAddHelperToGroup.php' target='dummyframe' method='POST'>
                                            <select name='helper_id' id='cars'>
                                ";
                                            $sql3 = "SELECT tname, id FROM service_helper WHERE service_helper.id NOT IN (SELECT ct_group_helper.helper_id_fk FROM ct_group_helper where group_id_fk = ".$row['id'].")";
                                            $result3 = $conn->query($sql3);
                                            if ($result3->num_rows > 0) {
                                                echo " <option disabled selected value> -- select -- </option>";
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    echo "<option value = ".$row3['id'].">".$row3['tname']."</option>";
                                                }
                                            }        
                                echo "</select>
                                            <input type='hidden' name='group_id' value=". $row['id'] .">
                                            <button type='submit' class='connect cap' onclick='setTimeout(function() {location.reload();}, 100);'>add</button>
                                        </form>
                                        
                                    </td>
                                ";
                                // remove helper
                                echo "
                                <td>
                                        <form action='../controller/ConRemoveHelperToGroup.php' target='dummyframe' method='POST'>
                                            <select name='helper_id' id='cars'>
                                ";
                                            $sql5 = "SELECT service_group.id,service_group.tname,ct_group_helper.helper_id_fk,service_helper.tname as hname FROM service_group LEFT JOIN ct_group_helper ON ct_group_helper.group_id_fk = service_group.id LEFT JOIN service_helper ON ct_group_helper.helper_id_fk = service_helper.id where service_group.id = ".$row['id'];
                                            $result5 = $conn->query($sql5);
                                            if ($result5->num_rows > 0) {
                                                echo " <option disabled selected value> -- select -- </option>";
                                                while ($row5 = $result5->fetch_assoc()) {
                                                    echo "<option value = ".$row5['helper_id_fk'].">".$row5['hname']."</option>";
                                                }
                                            }        
                                echo "</select>
                                            <input type='hidden' name='group_id' value=". $row['id'] .">
                                            <button type='submit' class='connect cap' onclick='setTimeout(function() {location.reload();}, 100);'>remove</button>
                                        </form>
                                    </td>
                                            
                                </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </table>
        
    </div>
    </body>

<script src="../js/main.js"></script>
<script>
    //equiv buttons real group name   ==>  $(this).parent().prev().html() 
    //id   =>>    $(this).parent().prev().attr("value");

    // delete_instance
    $(".delete_instance").each(function() {
        $(this).on('click', function(e) {
            if (confirm("Comfirm to delete?")) {
                let id = $(this).parent().prev().attr("value"); //get the id

                $.ajax({
                    type: "POST", 
                    url: '../controller/groupDelete.php', // get the route value
                    data: {
                        id: id
                    }, 
                    beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                    },
                    success: function(response) { //once the request successfully process to the server side it will return result here
                        // Reload lists of employees
                        location.reload();
                    }
                });

            } else {
                text = "Delete action is not confirmed for " + "group: " + name;
            }
            $('#manipulate_display').text(text);
        })
    });
    //add group
    $("#show_add_instance").append(add_form_group);
    $(".add-form").on("submit", function() {
        if($("#var_inp").val() == ""){
            event.preventDefault();
            alert("empty name! plz enter again");
        }else{
            alert("submited");
            console.log("submitted");
            setTimeout(function() {
                location.reload();
            }, 500);
            $('#manipulate_display').text("submited, refreshing soon");
        }
       
    })

    // edit_group_name
    $(".edit_instance_name").each(function() {
        $(this).on('click', function() {
            let text;

            let newName = prompt('Enter New Name: ', $(this).parent().prev().html());
            let name = $(this).parent().prev().html();
            if (!newName == "") {
                if (newName != name) {
                    //confirm
                    if (confirm("Confirm to change the name?")) {
                        let id = $(this).parent().prev().attr("value");
                        //ajax config
                        $.ajax({
                            type: "POST", //
                            url: '../controller/groupNameEdit.php', // get the route value
                            data: {
                                id: id,
                                newName: newName
                            }, //set data
                            beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                            },
                            success: function(response) { //once the request successfully process to the server side it will return result here
                                // Reload lists of employees
                                location.reload();
                            }
                        });
                    } else {
                        text = "forget the change";
                    }
                    $('#manipulate_display').text(text);
                }
            }
        })
    });

    //reload page
    function reloads(c){
        setTimeout(function() {
                    location.reload();
                }, c);
        $('#manipulate_display').text("submited, refreshing soon");

    }

    
</script>

