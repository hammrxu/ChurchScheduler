<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Church Scheduler</title>
	<link href="../css/nav.css" rel="stylesheet">
	<link href="../css/apis.css" rel="stylesheet">


	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../components/add_form.js"></script>
</head>

<body>
	<?php
	require_once("../components/navBar.php");
	?>
	<iframe name="dummyframe" style="display:none;"></iframe>
	<!-- Pushy Menu -->
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

	<div class="wrapper">

		<div class="top_navbar">
			<div class="logo">
				<a href="#">Coding Market</a>
			</div>
			<div class="top_menu">
				<div class="home_link">
					<a href="#" onclick="window.location.reload();">
						<span class="icon"><i class="fas fa-home"></i></span>
						<span>Home</span>
					</a>
				</div>
				<div class="right_info">
					<div class="icon_wrap">
						<div class="icon">
							<i class="fas fa-bell"></i>
						</div>
					</div>
					<div class="icon_wrap">
						<div class="icon">
							<i class="fas fa-cog"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main_body">

			<div class="sidebar_menu">
				<div class="inner__sidebar_menu">

					<ul>
						<li>
							<a href="./APIs.php" class="active">
								<span class="icon">
									<i class="fa fa-bell-o"></i></span>
								<span class="list">APIs</span>
							</a>
						</li>
						<li>
							<a href="./API-helpers.php">
								<span class="icon"><i class="fa fa-info"></i></span>
								<span class="list">Helpers API</span>
							</a>
						</li>
						<li>
							<a href="./API-groups.php">
								<span class="icon"><i class="fa fa-info"></i></span>
								<span class="list">Groups API</span>
							</a>
						</li>
						<li>
							<a href="./API-roles.php">
								<span class="icon"><i class="fa fa-info"></i></span>
								<span class="list">Roles API</span>
							</a>
						</li>
						<li>
							<a href="./API-sundays.php">
								<span class="icon"><i class="fa fa-info"></i></span>
								<span class="list">Sundays API</span>
							</a>
						</li>
					</ul>

					<div class="hamburger">
						<div class="inner_hamburger">
							<span class="arrow">
								<i class="fas fa-long-arrow-alt-left"></i>
								<i class="fas fa-long-arrow-alt-right"></i>
							</span>
						</div>
					</div>

				</div>
			</div>

			<div class="container">
				<div class="item_wrap">
					<div class="item">
						<a href="./API-helpers.php">
							<span class="icon"><i class="fa fa-info"></i></span>
							<span class="list">Helpers API</span>
						</a>
					</div>
				</div>
				<div class="item_wrap">
					<div class="item">
						<a href="./API-groups.php">
							<span class="icon"><i class="fa fa-info"></i></span>
							<span class="list">Groups API</span>
						</a>
					</div>
				</div>
				<div class="item_wrap">
					<div class="item">
						<a href="./API-roles.php">
							<span class="icon"><i class="fa fa-info"></i></span>
							<span class="list">Roles API</span>
						</a>
					</div>
				</div>
				<div class="item_wrap">
					<div class="item">
						<a href="./API-sundays.php">
							<span class="icon"><i class="fa fa-info"></i></span>
							<span class="list">Sundays API</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
<script>
	$(".hamburger").click(function() {
		$(".wrapper").toggleClass("active")
	})
</script>

</html>