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
$pincode = $_SESSION['login_user']['Pin_Code'];
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
	<!-- DATATABLE STYLE  -->
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- GOOGLE FONT -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-collapse collapse ">
						<ul id="menu-top" class="nav navbar-nav navbar-left">
							<li><a href="admin_dashboard.php">DASHBOARD</a></li>  
							<li><a href="pending_requests.php">PENDING REQUESTS</a></li>
							<li><a href="all_requests.php"  >WASTE PICKUP REQUESTS</a></li>
							<li><a href="all_trucks.php">TRUCKS LIST</a></li>
							<li><a href="all_workers.php" class="menu-top-active">WORKERS LIST</a></li>
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
					<h4 class="header-line">Workers List <!--: <?php echo $_SESSION['login_user']['Pin_Code'];?>-->
				</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						Workers' Availability
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Worker_ID</th>
										<th>Worker_Name</th>
										<th>Worker_Ph</th>
										<th>Availability</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$sql = "SELECT * FROM `sanitation_workers` ";
									$data= mysqli_query($con,$sql);

									while($result=mysqli_fetch_assoc($data))
										{ ?>

											<tr>
												<td><?php echo $result['Worker_ID'] ?></td>
												<td><?php echo $result['Worker_Name'] ?></td>
												<td><?php echo $result['Worker_Ph'] ?></td>
												<td><?php echo $result['Availability'] ?></td>      
											</tr>

										<?php  }
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!--End Advanced Tables -->
				</div>
			</div>
			<!-- /. ROW  -->
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
	<!-- DATATABLE SCRIPTS  -->
	<script src="assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
	<!-- CUSTOM SCRIPTS  -->
	<script src="assets/js/custom.js"></script>

</body>
</html>