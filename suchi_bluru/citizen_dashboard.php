<?php
	$server = "localhost" ;
	$username = "root";
	$password = "";

	$con = mysqli_connect($server,$username,$password);
	if(!$con)
	{
		die("Connection to Database failed due to".mysqli_connect_error());
	}
	mysqli_select_db($con, "swcs");
	session_start();
?>


<?php
	if (isset($_SESSION['login_user']))
	{ 

	$email =  $_SESSION['login_user']['email'];
	$sql = "SELECT `green_points` FROM `citizen_user` Where `email`='$email'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>

	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<title>CITIZEN DASHBOARD</title>
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
		<link rel="icon" href="https://image.flaticon.com/icons/png/512/401/401126.png" type="image/gif" />
	</head>

	<body>

		<header>
			<div class="header">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
							<div class="full">
								<div class="center-desk">
									<div class="logo"> <a href="#">Citizen Dashboard</a> </div>
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
											<li><div class="right-div"><a href="logout.php">LOG OUT</a></div></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- LOGO HEADER END-->
		<section class="menu-section">
			<div class="container">
				<div class="row ">
					<div class="col-md-12">
						<div class="navbar-collapse collapse ">
							<ul id="menu-top" class="nav navbar-nav navbar-center">
								<li><a href="citizen_dashboard.php" class="menu-top-active">DASHBOARD</a></li>   
								<li><a href="history.php">REQUEST HISTORY</a></li>
								<li><a href="waste_request_form.html">CREATE NEW PICKUP REQUEST</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- MENU SECTION END-->
		<div class="content-wrapper">
			<div class="container">
				<div class="row pad-botm">
					<div class="col-md-12">
						<h4 class="header-line"><?php echo $_SESSION['login_user']['fname'];?> <?php echo $_SESSION['login_user']['lname'];?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="alert alert-warning back-widget-set text-center">
							<i class="fa fa-briefcase fa-5x"></i>
							<h3><?php echo  $_SESSION['login_user']['email'] ?></h3>
							Email-ID
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="alert alert-danger back-widget-set text-center">
							<i class="fa fa-phone fa-5x"></i>
							<h3><?php echo $_SESSION['login_user']['num'] ?></h3>
							Phone Number
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="alert alert-success back-widget-set text-center">
							<i class="fa fa-leaf fa-5x"></i>
							<h3><?php echo  $row['green_points'] ?></h3>
							Green Points Earned
						</div>
					</div>
				</div> 
			</div>
		</div>

		<!-- CONTENT-WRAPPER SECTION END-->
		<section class="footer-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						Smart Waste Collection System
					</div>
				</div>
			</div>
		</section>
		<!-- FOOTER SECTION END-->
		<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
		<!-- CORE JQUERY  -->

		<!-- BOOTSTRAP SCRIPTS  -->
		<script src="assets/js/bootstrap.js"></script>


	</body>
	</html>
<?php } ?>