<?php
$title = "REST APIs | Church Scheduler";
$fileName = "APIs";
include_once "header.php";
?>

<body>

	<iframe name="dummyframe" style="display:none;"></iframe>
	<!-- Pushy Menu -->
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

	<div class="wrapper">



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


	<script src="../js/APIs.js"></script>

	<?php
	include_once "footer.php";
	?>