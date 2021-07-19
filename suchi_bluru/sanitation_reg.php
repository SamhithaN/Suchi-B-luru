<?php
session_start();
$conn = mysqli_connect('localhost','root','','swcs');

if(!$conn)
	{echo 'Fail connection to Database - '.mysqli_connect_error();}
if(empty($_POST['fullname']) || empty($_POST['contact']))
	{echo 'Both fields are required <br />';}
else
{     
		//echo htmlspecialchars($_POST['fullname']);   
		//echo htmlspecialchars($_POST['contact']);

	$id = rand (100,1000);    
	$contact = $_POST['contact'];
	$fullname = $_POST['fullname'];
	$check = "SELECT * FROM `swcs`.`sanitation_workers` WHERE Worker_Ph ='$contact'";
	$result = mysqli_query($conn, $check);
    $count = mysqli_num_rows($result);
	if($count == 0)
	{
		$sql = "INSERT INTO `swcs`.`sanitation_workers`(Worker_ID, Worker_Name, Worker_Ph) VALUES ('$id','$fullname','$contact')";  
		//echo "Your Worker ID is $id"; 
		if(mysqli_query($conn, $sql))
		{
			header("Location:all_workers.php");
			mysqli_close($conn);
		}
		else
		{
			echo 'Query error: '. mysqli_error($conn);
		}
	}
	else
	{
		echo '<script>var error = document.getElementById("exists")
		error.textContent = "Worker Already Exists"
		error.style.color = "red" 
		</script>';
	}

	
}

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
	<script src="sanitation_validation.js"></script>
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
							<li><a href="admin_dashboard.php" >DASHBOARD</a></li>
							<li><a href="pending_requests.php">PENDING REQUESTS</a></li>
							<li><a href="all_requests.php"  >WASTE PICKUP REQUESTS</a></li>
							<li><a href="all_trucks.php">TRUCKS LIST</a></li>
							<li><a href="all_workers.php">WORKERS LIST</a></li>
							<li><a href="add_new_truck.php" >NEW TRUCK</a></li>
							<li><a href="sanitation_reg.html" class="menu-top-active" >NEW WORKER</a></li>
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
					<h4 class="header-line">Admin: Worker Registration</h4>                
				</div>
			</div>
			<div class="row">                        
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							Addition of Sanitation Worker
						</div>
						<div class="panel-body">
							<form role="form" name = "sanitation_worker" action="sanitation_reg.php" onsubmit = "return formValidation()" method="post">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="fullname" id = "fullname" placeholder="Enter Worker Name" style="color:black;" required/>
									<span id = "worker_span"></span>
									<br><br>
								</div>

								<div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" type ="text" name="contact" id = "contact" placeholder="Enter Contact Number" style="color:black;"required />
									<span id = "contact_span"></span>
									<span id = "exists"></span>
									<br><br>
								</div>
								<center><button type="submit" class="btn btn-success">Register</button></center>
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
