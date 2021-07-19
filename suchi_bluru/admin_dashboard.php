 <?php
 session_start(); 
 ?>

 <?php 
 if(isset($_SESSION['login_user']))
 { 
 	?>

 	<!DOCTYPE html>
 	<html xmlns="http://www.w3.org/1999/xhtml">
 	<head>
 		<meta charset="utf-8" />
 		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 		<link rel="icon" href="https://image.flaticon.com/icons/png/512/401/401126.png" type="image/gif" />

 		<title>ADMIN DASHBOARD</title>
 		<!-- BOOTSTRAP CORE STYLE  -->
 		<link href="assets/css/bootstrap.css" rel="stylesheet" />
 		<!-- FONT AWESOME STYLE  -->
 		<link href="assets/css/font-awesome.css" rel="stylesheet" />
 		<!-- CUSTOM STYLE  -->
 		<link href="assets/css/style.css" rel="stylesheet" />
 		<!-- GOOGLE FONT -->
 		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 		<!-- style css -->
 		<link rel="stylesheet" href="css/style.css">
 	</head>

 	<body>
 		<header>
 			<!-- header inner -->
 			<div class="header">
 				<div class="container">
 					<div class="row">
 						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
 							<div class="full">
 								<div class="center-desk">
 									<div class="logo"> <a href="#">Admin Dashboard</a> </div>
 								</div>
 							</div>
 						</div>
 						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
 							<div class="menu-area">
 								<div class="limit-box">
 									<nav class="main-menu">
 										<ul class="menu-area-main">
 											<li> <a href="contact_details.php">Contact us</a> </li>
 											<li> <a href="green_credits_chart.php">Green Credits</a></li>
 											<li> <a href="logout.php">LOG OUT</a></li>
 										</ul>
 									</nav>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</header>

 		<section class="menu-section">
 			<div class="container">
 				<div class="row ">
 					<div class="col-md-12">
 						<div class="navbar-collapse collapse ">
 							<ul id="menu-top" class="nav navbar-nav navbar-left">
 								<li><a href="admin_dashboard.php" class="menu-top-active">DASHBOARD</a></li> 
 								<li><a href="pending_requests.php">PENDING REQUESTS</a></li>
 								<li><a href="all_requests.php"  >WASTE PICKUP REQUESTS</a></li>
 								<li><a href="all_trucks.php">TRUCKS LIST</a></li>
 								<li><a href="all_workers.php">WORKERS LIST</a></li>
 								<li><a href="add_new_truck.php" >NEW TRUCK</a></li>
 								<li><a href="sanitation_reg.html" >NEW WORKER</a></li>
 							</ul>
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>

 		<div class="content-wrapper">
 			<div class="container">
 				<div class="row pad-botm">
 					<div class="col-md-12">
 						<h4 class="header-line"><?php echo $_SESSION['login_user']['Admin_Name'];?></h4>
 					</div>
 				</div>
 				<div class="row">
 					<div class="col-md-3 col-sm-3 col-xs-6">
 						<div class="alert alert-info back-widget-set text-center">
 							<i class="fa fa-user fa-5x"></i>
 							<h3><?php echo $_SESSION['login_user']['Area_Name'] ?></i></h3>
 							Area Administered
 						</div>
 					</div>
 					<div class="col-md-3 col-sm-3 col-xs-6">
 						<div class="alert alert-success back-widget-set text-center">
 							<i class="fa fa-bars fa-5x"></i>
 							<h3><?php echo $_SESSION['login_user']['Pin_Code'] ?></h3>
 							Area Pin Code
 						</div>
 					</div>
 					<div class="col-md-3 col-sm-3 col-xs-6">
 						<div class="alert alert-warning back-widget-set text-center">
 							<i class="fa fa-briefcase fa-5x"></i>
 							<h3><?php echo $_SESSION['login_user']['Admin_email']?></h3>
 							Email-ID
 						</div>
 					</div>
 					<div class="col-md-3 col-sm-3 col-xs-6">
 						<div class="alert alert-danger back-widget-set text-center">
 							<i class="fa fa-phone fa-5x"></i>
 							<h3><?php echo $_SESSION['login_user']['Admin_Ph']?></h3>
 							Phone Number
 						</div>
 					</div>
 				</div> 
 			</div>
 		</div>

 		<section class="footer-section">
 			<div class="container">
 				<div class="row">
 					<div class="col-md-12">
 						Smart Waste Management System 
 					</div>
 				</div>
 			</div>
 		</section>

 		<!-- BOOTSTRAP SCRIPTS  -->
 		<script src="assets/js/bootstrap.js"></script>
 	</body>
</html>
<?php } ?>
