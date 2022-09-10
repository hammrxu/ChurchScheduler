<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<div id="profile" class="profile"><h1>Hi, user"' . $_SESSION['username'] . '" Welcome to profile page, it is being developing! Check it later!</div>';
}
