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
    <div id="wrap">
        <span class="system"></span>
        <div id="manipulate_display"></div>
        <div id="show_add_instance">
        </div>
        <iframe name="dummyframe" style="display:none;"></iframe>
            <?php
                // different
                $table = "service_role"; 
                $sql = "SELECT id,tname FROM {$table} order by tname ASC"; 
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table class='styled-table'>
                                <caption style='text-transform: capitalize;'>service role management</caption>
                                <thead>
                                    <tr>
                                        <td>role</td>
                                        <td>manage</td>
                                        <td>groups
                                        <td>add group</td>
                                        <td>remove group</td>
                                        <td>helpers
                                        <td>add helper</td>
                                        <td>remove helper</td>
                                    </tr>
                                </thead>
                        ";
                    while ($row = $result->fetch_assoc()) {
                        //Groups
                        $sql2 = "SELECT service_role.id,service_role.tname,ct_role_group.group_id_fk,service_group.tname as hname FROM service_role LEFT JOIN ct_role_group ON ct_role_group.role_id_fk = service_role.id LEFT JOIN service_group ON ct_role_group.group_id_fk = service_group.id where service_role.id = ".$row['id'];
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
                                    //show groups
                            echo "<td>".$nameList."</td>";
                            //add group
                            echo "
                                    <td>
                                        <form action='../controller/ConAddGroupToRole.php' target='dummyframe' method='POST'>
                                            <select name='group_id' id='cars'>
                                ";
                                
                                            $sql3 = "SELECT tname, id FROM service_group WHERE service_group.id NOT IN (SELECT ct_role_group.group_id_fk FROM ct_role_group where role_id_fk = ".$row['id'].")";
                                            $result3 = $conn->query($sql3);
                                            if ($result3->num_rows > 0) {
                                                echo " <option disabled selected value> -- select -- </option>";
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    echo "<option value = ".$row3['id'].">".$row3['tname']."</option>";
                                                }
                                            }        
                                echo "</select>
                                            <input type='hidden' name='role_id' value=". $row['id'] .">
                                            <button type='submit' class='connect cap' 
                                            onclick='setTimeout(function() {location.reload();}, 100);'
                                            >G_add</button>
                                        </form>
                                        
                                    </td>
                                ";
                                // remove group
                                echo "
                                <td>
                                        <form action='../controller/ConRemoveGroupToRole.php' target='dummyframe' method='POST'>
                                            <select name='group_id' id='cars'>
                                ";
                                            $sql5 = "SELECT service_role.id,service_role.tname,ct_role_group.group_id_fk,service_group.tname as hname FROM service_role LEFT JOIN ct_role_group ON ct_role_group.role_id_fk = service_role.id LEFT JOIN service_group ON ct_role_group.group_id_fk = service_group.id where service_role.id = ".$row['id'];
                                            $result5 = $conn->query($sql5);
                                            if ($result5->num_rows > 0) {
                                                echo " <option disabled selected value> -- select -- </option>";
                                                while ($row5 = $result5->fetch_assoc()) {
                                                    echo "<option value = ".$row5['group_id_fk'].">".$row5['hname']."</option>";
                                                }
                                            }        
                                echo "</select>
                                            <input type='hidden' name='role_id' value=". $row['id'] .">
                                            <button type='submit' class='connect cap' 
                                            onclick='setTimeout(function() {location.reload();}, 100);'
                                            >G_remove</button>
                                        </form>
                                    </td>";




// helpers start
                                    $sql7 = "SELECT service_role.id,service_role.tname,ct_role_helper.helper_id_fk,service_helper.tname as hname FROM service_role LEFT JOIN ct_role_helper ON ct_role_helper.role_id_fk = service_role.id LEFT JOIN service_helper ON ct_role_helper.helper_id_fk = service_helper.id where service_role.id = ".$row['id'];
                                    $result7 = $conn->query($sql7);
                                    $nameList='';
                                    if ($result7->num_rows > 0) {
                                        while ($row7 = $result7->fetch_assoc()) {
                                            $nameList.=$row7['hname'];
                                            $nameList.=", ";
                                        }
                                        $nameList = substr($nameList, 0, -2);
                                    }
                                                //show helpers
                                        echo "<td>".$nameList."</td>";
                                        //add helper
                                        echo "
                                                <td>
                                                    <form action='../controller/ConAddHelperToRole.php' target='dummyframe' method='POST'>
                                                        <select name='helper_id' id='cars'>
                                            ";
                                                        $sql8 = "SELECT tname, id FROM service_helper WHERE service_helper.id NOT IN (SELECT ct_role_helper.helper_id_fk FROM ct_role_helper where role_id_fk = ".$row['id'].")";
                                                        $result8 = $conn->query($sql8);
                                                        if ($result8->num_rows > 0) {
                                                            echo " <option disabled selected value> -- select -- </option>";
                                                            while ($row8 = $result8->fetch_assoc()) {
                                                                echo "<option value = ".$row8['id'].">".$row8['tname']."</option>";
                                                            }
                                                        }        
                                            echo "</select>
                                                        <input type='hidden' name='role_id' value=". $row['id'] .">
                                                        <button type='submit' class='connect cap' 
                                                        onclick='setTimeout(function() {location.reload();}, 100);'
                                                        >H_add</button>
                                                    </form>
                                                    
                                                </td>
                                            ";
                                                
                                            // remove helper
                                            echo "
                                            <td>
                                                    <form action='../controller/ConRemoveHelperToRole.php' target='dummyframe' method='POST'>
                                                        <select name='helper_id' id='cars'>
                                            ";
                                                        $sql9 = "SELECT service_role.id,service_role.tname,ct_role_helper.helper_id_fk,service_helper.tname as hname FROM service_role LEFT JOIN ct_role_helper ON ct_role_helper.role_id_fk = service_role.id LEFT JOIN service_helper ON ct_role_helper.helper_id_fk = service_helper.id where service_role.id = ".$row['id'];
                                                        $result9 = $conn->query($sql9);
                                                        if ($result9->num_rows > 0) {
                                                            echo " <option disabled selected value> -- select -- </option>";
                                                            while ($row9 = $result9->fetch_assoc()) {
                                                                echo "<option value = ".$row9['helper_id_fk'].">".$row9['hname']."</option>";
                                                            }
                                                        }        
                                            echo "</select>
                                                        <input type='hidden' name='role_id' value=". $row['id'] .">
                                                        <button type='submit' class='connect cap' 
                                                        onclick='setTimeout(function() {location.reload();}, 100);'
                                                        >H_remove</button>
                                                    </form>
                                                </td>";       
                                                
//helpers end
                                            
                                echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </table>
        
    </div>
    </body>

<script src="../js/main.js"></script>
<script>
    //equiv buttons real role name   ==>  $(this).parent().prev().html() 
    //id   =>>    $(this).parent().prev().attr("value");

    // delete_instance
    $(".delete_instance").each(function() {
        $(this).on('click', function(e) {
            if (confirm("Comfirm to delete?")) {
                let id = $(this).parent().prev().attr("value"); //get the id

                $.ajax({
                    type: "POST", 
                    url: '../controller/roleDelete.php', // get the route value
                    data: {
                        id: id
                    }, 
                    beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                    },
                    success: function(response) { //once the request successfully process to the server side it will return result here
                        // Reload lists of employees
                        console.log("succeed");
                        location.reload();
                    }
                });

            } else {
                text = "Delete action is not confirmed for " + "role: " + name;
            }
            $('#manipulate_display').text(text);
        })
    });
    //add role
    $("#show_add_instance").append(add_form_role);
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

    // edit_role_name
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
                            url: '../controller/roleNameEdit.php', // get the route value
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

