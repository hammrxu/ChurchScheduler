<!-- db connection start-->
<?php
include_once '../Config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/nav.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <?php if (file_exists('../css/' . $fileName . '.css')) {
        echo '<link href="../css/' . $fileName . '.css" rel="stylesheet">';
    }
    ?>

    </style>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>

<body>
    <?php
    require_once("../components/navBar.php");
    ?>