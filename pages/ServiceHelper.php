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
    require_once("../components/navBar.html");
?>

    <div>
        <span class="system"></span>
        <div id="manipulate_display"></div>
        <div id="add_instance" class="helper_detail_box"></div>
        <iframe name="dummyframe" style="display:none;"></iframe>
        <table class='styled-table'>
            <caption style='text-transform: capitalize;'>service helper management</caption>
            <thead>
                <tr>
                    <td>helper</td>
                    <td>manage</td>
                </tr>
            </thead>

            <?php
                // different
                $table = "service_helper"; 
                $sql = "SELECT id,tname FROM {$table} order by tname ASC";
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td value=". $row['id'] . ">" . $row["tname"] . "</td>
                                    <td>
                                        <button class='delete_instance cap fixed-button'>delete</button>
                                        <button class='edit_instance_detail cap fixed-button'>edit</button>
                                    </td>
                                </tr>";
                    }
                }
            ?>
        </table>
    </div>
    </body>

<script src="../js/main.js"></script>
<script>
    //equiv buttons real helper name   ==>  $(this).parent().prev().html() 
    //id   =>>    $(this).parent().prev().attr("value");

    // delete_instance
    $(".delete_instance").each(function() {
        $(this).on('click', function(e) {
            if (confirm("Comfirm to delete?")) {
                let id = $(this).parent().prev().attr("value"); //get the id

                $.ajax({
                    type: "POST", 
                    url: '../controller/helperDelete.php', // get the route value
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
                text = "Delete action is not confirmed for " + "helper: " + name;
            }
            $('#manipulate_display').text(text);
        })
    });
    //add helper
    $("#add_instance").append(add_form_helper).on('click', function(e) {
            //TODO：用email自动发送一个感谢注册的页面
            $('#add-submit').on("click", function() {
                setTimeout(function() {
                    location.reload();
                }, 500);
                $('#manipulate_display').text("submited, refreshing soon");
            })
    });

    // edit_helper_detail
    $(".edit_instance_detail").each(function() {
        $(this).on('click', function(e) {
            let target_id = $(this).parent().prev().attr("value");
            console.log(target_id);

            let formURL = '../controller/helperDetailUpdate.php';
            let form =document.querySelector('.add-form');
            console.log(form);
    
            let name = document.querySelector('#var_inp');
            let prefername = document.querySelector('#newhelper_p');
            let email = document.querySelector('#email');
            let notify = document.querySelector('#nofity');
            let idvalue = document.querySelector('#idvalue');

            

            $.ajax({
                    type: "POST", 
                    url: '../controller/helperDetail.php', // get the route value
                    data: {
                        id: target_id
                    }, 
                    beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                    },
                    success: function(response) { //once the request successfully process to the server side it will return result here

                        let json = JSON.parse(response);
                        console.log(json[0]);

                        // change form from insert to update
                        form.action = formURL;

                        if(json[0].tname!=""){
                            name.value=json[0].tname;
                        }
                        
                        if(json[0].tname_p!=""){
                            prefername.value=json[0].tname_p;
                        }
                        
                        if(json[0].email!=""){
                            email.value=json[0].email;
                        }
                        
                        if(json[0].notify!=""){
                            // TOFIX
                            // console.log(json[0].notify);
                            // console.log(notify.value);
                            // notify.value=json[0].notify;
                            // notify.value="0";
                        }
                        
                        if(json[0].id!=""){
                            idvalue.value=json[0].id;
                        }
                    }
                });
        })
    });
</script>

<!-- put at end -->
<script>
    $("button").toggleClass("button-8");
    $("button").attr("role","button");
</script>