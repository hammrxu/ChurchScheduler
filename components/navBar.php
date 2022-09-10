<div id="nav-space"></div>
<div class="navbar-wrap">
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="../pages/PlanSchedule.php">Scheduling</a>
        <div class="dropdown">
            <div class="dropbtn">View
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <a href="#">Schedule for All</a>
                <a href="#">Your Schedule</a>
            </div>
        </div>

        <div class="dropdown">
            <div class="dropbtn">Manage
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <a href="../pages/ServiceRole.php">Service Role</a>
                <a href="../pages/ServiceGroup.php">Service Group</a>
                <a href="../pages/ServiceHelper.php">Service Helper</a>
            </div>
        </div>
        <a href="../pages/DemoData.php">DemoData</a>
        <a href="../pages/APIs.php">APIs</a>
    </div>


    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo '<div id="nav-login" class="nav-log"><a href="../pages/login/profile.php" style="color:white;cursor:pointer;">Hi, ' . $_SESSION['username'] . '</a>&nbsp;<a href=../pages/logout/logout.php style="color:white;cursor:pointer;">
        Log Out</a></div>';
    } else {
        echo '<div id="nav-login" class="nav-log"><a href="../pages/login/login.php" style="color:white;cursor:pointer;">Login/SignUp</a></div>';
    }
    ?>




    <div id="icon-letter">Church Scheduler</div>
</div>