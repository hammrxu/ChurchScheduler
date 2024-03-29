<?php
$title = "Scheduling | Church Scheduler";
$fileName = "Scheduling";
include_once "header.php";
?>

<script src="../components/add_form.js"></script>

<iframe name="dummyframe" style="display:none;"></iframe>
<pre id="memo">
*Each role at a time can be assign by ONE GROUP or ONE HELPER.
If two persons, make them form a group/team at page <a href='../pages/ServiceGroup.php' style='color:orange' >Manage Service Group</a></pre>
</br>

<!-- developing -->
<div>
    <form action="../controller/" method="POST" target="dummyframe">
        <label>Start Date</label><input type="date" name="start" id="start" min="2022-06-04"></input>
        <label>End Date</label><input type="date" name="end" id="end" max="2050-06-04"></input>
        <button onclick="alert('In Developing');"> Submit</button>
    </form>
</div>

<form action='../controller/scheduler/submitForm.php' target='dummyframe' method='POST'>
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
        $role_list = [];
        if ($result->num_rows > 0) {
            echo "<table class='styled-table'>
                            <caption style='text-transform: capitalize;'>Scheduing</caption>
                            <thead>
                                <td></td>
                            ";
            while ($row = $result->fetch_assoc()) {
                array_push($role_id_list, $row['id']);
                array_push($role_list, $row['tname']);
                echo "
                                <td value=" . $row['id'] . ">" . $row["tname"] . "</td>
                            ";
                $row_counts++;
            }

            echo "</thead>";

            // 2 start
            $table = "sundays";
            $sql2 = "SELECT sunday FROM sundays where year = 2022 order by sunday ASC";

            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                $index = 1;

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $thatSunday = $row2['sunday'];
                    $role_list_index = 0;
                    echo "
                            <tr id='row$index'>
                            
                                <td>" . $row2['sunday'] . "</td>";
                    $index++;
                    for ($i = 0; $i < $row_counts; $i++) {
                        // 3 start
                        //select helper
                        echo "<td class='wrapper'>";
                        echo "<div class='cellcontent'>";
                        $sql3 = "SELECT id, tname FROM service_helper where id in (select helper_id_fk from ct_role_helper where role_id_fk =" . $role_id_list[$i] . ")";
                        $result3 = $conn->query($sql3);

                        //select group
                        $sql4 = "SELECT id, tname FROM service_group where id in (select group_id_fk from ct_role_group where role_id_fk =" . $role_id_list[$i] . ")";
                        $result4 = $conn->query($sql4);
                        echo "<label></label>";
                        echo "<select name='mix_select' class='mix_select' ><option disabled selected></option>"; //onchange='func(row$index,this.value);'

                        //select helper
                        if ($result3->num_rows > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo "<option 
                                                    value='" . $row3['id'] . "|'
                                                    data-type=helper
                                                    data-value='" . $row3['tname'] . "'
                                                    data-date='" . $thatSunday . "'
                                                    data-role='" . [$role_list[$role_list_index]] . "'"
                                    . ">" . $row3['tname'] . "</option>";
                            }
                        }

                        //select group
                        if ($result4->num_rows > 0) {
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                echo "<option 
                                            value='" . $row4['id'] . "'
                                            data-type=group
                                            data-value='" . $row4['tname'] . "'
                                            data-date='" . $thatSunday . "'
                                            data-role='" . [$role_list[$role_list_index]] . "'"
                                    . ">" . $row4['tname'] . "</option>";
                            }
                        }


                        echo "</select>";
                        echo "</div>";
                        echo "<span class='destination'></span>";
                        echo "</td>";
                        $role_list_index = $role_list_index + 1;
                    }

                    echo "</tr>";
                }
            }
            // 2 end
            echo "</table>";
        }
        ?>
    </div>
    <button type="submit" name="submit" id="submit">Submit Form</button>
</form>

<script>
    $(() => $('table').addClass("full-width"));

    function getDefaultOffDays(year) {
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


    function selectTrigger() {
        $('.mix_select').change(function(e) {
            showSelectedHideSelection(e);
        });

        function showSelectedHideSelection(e) {
            //clear
            x = e.target; //select
            selected = $(x.options[x.selectedIndex]);
            cellcontent = $(x.parentElement);
            destination = cellcontent.next();
            $(cellcontent).toggleClass('cellcontent-active');
            destination.html("");
            destination.toggleClass('destination-active');
            destination.html(x.options[x.selectedIndex].text + '<i class="fa fa-times" aria-hidden="true"></i>' +

                '<input type="hidden" memo="date" value="' + selected.attr('data-date') + '">' +
                // id
                '<input type="hidden" memo="id" value="' + selected.attr('value') + '">' +
                //roleid
                '<input type="hidden" memo="roleid" value="' + selected.attr('data-role') + '">' +
                //tname
                '<input type="hidden" memo="tname" value="' + selected.attr('data-value') + '">'
            );
            console.log("block shown");


            //remove item and show select again
            $('.fa-times').click(function() {
                console.log("x is clicked");
                console.log(e.target.parentElement);
                $(e.target.parentElement).toggleClass('cellcontent-active');
                $(e.target.parentElement).next().toggleClass('destination-active');
                $(e.target.parentElement).next().empty();
                //reset select to default
                var options = e.target.options;
                console.log(options);
                for (var i = 0, l = options.length; i < l; i++) {
                    options[i].selected = options[i].defaultSelected;
                }
            });
        }







    }
    // }
    selectTrigger();

    function getLaterOffDays(list, day3) {
        let day = new Date();
        let newlist = [];
        let day2 = new Date(2022, 06, 04);
        for (let i = 0; i < list.length; i++) {
            dateInList = new Date(list[i])
            if (day2 <= dateInList) {
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
    function func(abb, b) {
        console.log(b);
        row = document.querySelector(`[data-name=${CSS.escape(abb)}]`);
        console.log(row);
    }
</script>


<?php
include_once "footer.php";
?>