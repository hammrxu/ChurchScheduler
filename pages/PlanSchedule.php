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
    <link href="../css/Scheduling.css" rel="stylesheet">
    

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../components/add_form.js"></script>
</head>

<body>
    <?php
        require_once("../components/navBar.html");
    ?>

    <iframe name="dummyframe" style="display:none;"></iframe>
    </br>
    
    <!-- developing -->
    <div>
        <form action="../controller/" method="POST" target="dummyframe">
            <label>Start Date</label><input type="date" name="start" id="start" min="2022-06-04"></input>
            <label>End Date</label><input type="date" name="end" id="end" max="2050-06-04"></input>
            <button onclick="alert('In Developing');"> Submit</button>
        </form>
    </div>        


    <div id="big-table-wrap">
    <?php
        // 1 start
        $role_id_list = [];
        $table = "service_role"; 
        $sql = "SELECT id,tname FROM {$table} order by tname ASC";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query($sql);
        $row_counts = 0;
        if ($result->num_rows > 0) {
            echo "<table class='styled-table'>
                        <caption style='text-transform: capitalize;'>Scheduing</caption>
                        <thead>
                            <td>Contact</td>
                        ";
            while ($row = $result->fetch_assoc()) {
                    array_push($role_id_list, $row['id']);
                    echo "
                            <td value=". $row['id'] . ">" . $row["tname"] . "</td>
                        ";
                        $row_counts++;
            }

            echo "</thead>";

            // 2 start
            $table = "sundays"; 
            $sql2 = "SELECT sunday FROM sundays where year = 2022 order by sunday ASC";
           
            $result2 = $conn->query($sql2);
            
            if ($result2->num_rows > 0) {
                $index =1;
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "
                        <tr id='row$index'>
                        
                            <td>".$row2['sunday']."</td>";
                    $index++;
                    for($i=0;$i<$row_counts;$i++){
                        // 3 start
                        //select helper
                        echo "<td class='wrapper'>";
                                
                                $sql3 = "SELECT id, tname FROM service_helper where id in (select helper_id_fk from ct_role_helper where role_id_fk =" .$role_id_list[$i].")" ;
                                $result3 = $conn->query($sql3);
                                echo"<label>Select Helper</label>";
                                echo "<select name= role class='helper_select' onchange='func(row$index,this.value);'>";
                                if ($result3->num_rows > 0) {
                                    while($row3 = mysqli_fetch_assoc($result3)){
                                                echo "<option>Select Helper</option>";
                                                echo "<option value='".$row3['id']."'>".$row3['tname']."</option>";
                                    }
                                }
                        echo "</select>";
                        echo "</br>";
                        // 3 end
                                // 4 start
                                //select group
                                $sql4 = "SELECT id, tname FROM service_group where id in (select group_id_fk from ct_role_group where role_id_fk =" .$role_id_list[$i].")" ;
                                $result4 = $conn->query($sql4);
                                echo"<label>Select Group</label>";
                                echo "<select name= group>";
                                if ($result4->num_rows > 0) {
                                    while($row4 = mysqli_fetch_assoc($result4)){
                                                echo "<option>Select Group</option>";
                                                echo "<option value='".$row4['id']."'>".$row4['tname']."</option>";
                                    }
                                }
                        echo "</select></td>";


                    }
                        
                    echo "</tr>";
                }
            }
            // 2 end
            echo "</table>";
        }
    ?>
        
        
        
    </div>
</body>
<script>
    $(()=> $('table').addClass("full-width"));
    
    function getDefaultOffDays(year){
        var date = new Date(year, 0, 1);
        while (date.getDay() != 0) {
            date.setDate(date.getDate() + 1);
        }
        var days = [];
        while (date.getFullYear() == year) {
            var m = date.getMonth() + 1;
            var d = date.getDate();
            days.push(
            year + '-' +
            (m < 10 ? '0' + m : m) + '-' +
            (d < 10 ? '0' + d : d)
            );
            date.setDate(date.getDate() + 7);
        }
        return days;
    }


    function getLaterOffDays(list,day3){
        let day = new Date();
        let newlist = [];
        let day2 = new Date(2022,06,04);
        for(let i=0;i<list.length;i++){
            dateInList = new Date(list[i])
            if(day2<=dateInList){
                newlist.push(list[i]);
            }
        }
        // console.log(day2);
        // console.log(newlist);
        return newlist;
        
    }

    // function SQLInsertgenerator(year){
    //     let sundays= getDefaultOffDays(year);
    //     str = "";
    //     for(let i=0;i<sundays.length;i++){
    //         str += "insert into sundays (year, sunday) values ('"+year+"','"+sundays[i]+"');";
    //     }
    //     console.log(str);
    // }
    // SQLInsertgenerator(2025);
    

    //group
    // function get_group(){
    //     let group = {};

    //     $.ajax({
    //                 type: "POST", 
    //                 url: '../controller/scheduler/get_group.php', 
    //                 beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

    //                 },
    //                 success: function(response) { //once the request successfully process to the server side it will return result here
    //                     group = response;
    //                 }
    //             });
    //             console.log(group);
    //     return group;
    // }

    // get_group();


</script>
<script>
    let dragged;

/* events fired on the draggable target */
document.addEventListener("drag", (event) => {
  console.log("dragging");
});

document.addEventListener("dragstart", (event) => {
  // store a ref. on the dragged elem
  dragged = event.target;
  // make it half transparent
  event.target.classList.add("dragging");
});

document.addEventListener("dragend", (event) => {
  // reset the transparency
  event.target.classList.remove("dragging");
});

/* events fired on the drop targets */
document.addEventListener("dragover", (event) => {
  // prevent default to allow drop
  event.preventDefault();
}, false);

document.addEventListener("dragenter", (event) => {
  // highlight potential drop target when the draggable element enters it
  if (event.target.classList.contains("dropzone")) {
    event.target.classList.add("dragover");
  }
});

document.addEventListener("dragleave", (event) => {
  // reset background of potential drop target when the draggable element leaves it
  if (event.target.classList.contains("dropzone")) {
    event.target.classList.remove("dragover");
  }
});

document.addEventListener("drop", (event) => {
  // prevent default action (open as link for some elements)
  event.preventDefault();
  // move dragged element to the selected drop target
  if (event.target.classList.contains("dropzone")) {
    event.target.classList.remove("dragover");
    dragged.parentNode.removeChild(dragged);
    event.target.appendChild(dragged);
  }
});
        
</script>
<script>
    function func(abb,b){
        console.log(b);
        row = document.querySelector(`[data-name=${CSS.escape(abb)}]`);
        console.log(row);
    }
</script>
</html>

<!-- put at end -->
<script>
    $("button").toggleClass("button-8");
    $("button").attr("role","button");
</script>