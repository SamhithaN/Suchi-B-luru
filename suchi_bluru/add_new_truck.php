<?php 
include("config.php");

mysqli_select_db($con, "swcs");
session_start();
include('workers_array.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

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
	<script src="truck_validation.js"></script>
</head>

<body>
	<header>
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
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-collapse collapse ">
						<ul id="menu-top" class="nav navbar-nav navbar-left">
							<li><a href="admin_dashboard.php">DASHBOARD</a></li>
							<li><a href="pending_requests.php">PENDING REQUESTS</a></li>
							<li><a href="all_requests.php"  >WASTE PICKUP REQUESTS</a></li>
							<li><a href="all_trucks.php" >TRUCKS LIST</a></li>
							<li><a href="all_workers.php">WORKERS LIST</a></li>
							<li><a href="add_new_truck.php" class="menu-top-active">NEW TRUCK</a></li>
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
					<h4 class="header-line">Admin <?php echo $_SESSION['login_user']['Pin_Code'];?>: Truck Registration</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							Addition of New Truck
						</div>
						<div class="panel-body">
							<form name = "truck" role="form" action="new_truck.php" onsubmit = "return formValidation()" method="POST">
								<div class="form-group">
									<label>Vehicle Number</label>
									<input class="form-control" type="text" name="vehicle" id = "vehicle" placeholder="Enter Vehicle Number" style="color:black;"/>
									<span id = "veh_span"></span>
									<span id = "exists"></span>
								</div>
								<div class="form-group">
									<label>Vehicle Capacity (in kgs)</label>
									<input class="form-control" type ="float" name="capacity" id = "capacity" placeholder="Enter Vehicle Capacity" style="color:black;" />
									<span id = "cap_span"></span>
								</div>
						
								<label>Choose Worker</label><br>
								<select class="form-control" type ="text" name="worker" id="worker" style="height: 55px;" >
<option value='Select Worker' selected disabled >Assign Worker</option>
<?php
for($x=0;$x<$i;$x++)
{
	echo "<option value=$worker[$x]>$worker_name[$x](Worker ID : $worker[$x])</option>";
}
?>
</select>
								<center><button type="submit" class="btn btn-info">Register</button></center>
							</form>								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					Smart Waste Collection System 
				</div>
			</div>
		</div>
	</section>

	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
	<!-- CORE JQUERY  -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS  -->
	<script src="assets/js/bootstrap.js"></script>
	<!-- CUSTOM SCRIPTS  -->
	<script src="assets/js/custom.js"></script>

</body>
</html>
