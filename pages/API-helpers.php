<?php
$title = "Helpers | REST APIs | Church Scheduler";
$fileName = "API-helpers";
include_once "header.php";
?>

<link href="../css/APIs.css" rel="stylesheet">
<?php
require_once("../components/navBar.php");
?>
<iframe name="dummyframe" style="display:none;"></iframe>
<!-- Pushy Menu -->
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">


	<div class="main_body">

		<div class="sidebar_menu">
			<div class="inner__sidebar_menu">

				<ul>
					<li>
						<a href="./APIs.php">
							<span class="icon">
								<i class="fa fa-bell-o"></i></span>
							<span class="list">APIs</span>
						</a>
					</li>
					<li>
						<a href="./API-helpers.php" class="active">
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
			<div class="item_wrap head-wrap">
				<div class="item">
					<a href="./API-helpers.php">
						<span class="icon"><i class="fa fa-info"></i></span>
						<span class="list">Helpers API</span>
					</a>
				</div>
				<div class="item head">
					<div class="card-name head-name">PARAMETERS</div>
					<div class="card-title head-title">tname(string), tname_p(string), email(string), notify(1:notify/0:not notify)</div>
					<div class="card-desc head-desc">Auto: id ( incremental ), last_edit ( current_time_stamp )</div>
				</div>
				<div class="item_wrap">

				</div>

			</div>
			<div class="item_wrap">
				<div class="item">
					<div class="card-name">read_single</div>
					<div class="card-title">Helper Get</div>
					<div class="card-desc">Use: /api/helper/read_single.php/?id=1</div>
				</div>
			</div>
			<div class="item_wrap">
				<div class="item">
					<div class="card-name">read</div>
					<div class="card-title">Helper Get</div>
					<div class="card-desc">Use: /api/helper/read.php</div>
				</div>
			</div>
			<div class="item_wrap">
				<div class="item">
					<div class="card-name">create</div>
					<div class="card-title">Helper Post</div>
					<div class="card-desc">Use: /api/helper/create.php, post with keys+values </div>
				</div>
			</div>
			<div class="item_wrap">
				<div class="item">
					<div class="card-name">delete</div>
					<div class="card-title">Helper Delete</div>
					<div class="card-desc">Use: /api/helper/delete.php, post with id+values </div>
				</div>
			</div>
			<div class="item_wrap">
				<div class="item">
					<div class="card-name">update</div>
					<div class="card-title">Helper Put</div>
					<div class="card-desc">Use: /api/helper/update.php, post with keys+values </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../js/APIs.js"></script>

<?php
include_once "footer.php";
?>