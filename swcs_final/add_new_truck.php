<?php 
include("config.php");
mysqli_select_db($con, "swcs");
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>ADMIN DASHBOARD</title>
	<!-- BOOTSTRAP CORE STYLE  -->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONT AWESOME STYLE  -->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- GOOGLE FONT -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<style>


	.align-top{
		border: 0;
		padding-top: 20px;
	}
	.btn_home {
      background-color: #00b38f;
      border: 12px;
      color: black;
      text-align: center;
      font-family: Source Sans Pro;
      margin: 4px 2px;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 8px;
      text-decoration: none;
	  font-weight: bold;
	  
	  
    }

	.btn_home:hover {
      background-color:  #00b38f;
	  text-decoration: none;
	  color: white;

    }


</style>
</head>


<body>
	<div class="navbar navbar-inverse set-radius-zero" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="align-top">
              <a class="btn_home" href="admin_dashboard.php">
              ADMIN DASHBOARD
            </a></div>

			</div>

			<div class="right-div">
				<a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
			</div>
		</div>
	</div>
	<!-- LOGO HEADER END-->
	<section class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-collapse collapse ">
						<ul id="menu-top" class="nav navbar-nav navbar-right">
							<li><a href="admin_dashboard.php">DASHBOARD</a></li>
							<li><a href="pending_requests.php">PENDING REQUESTS</a></li>
							<li><a href="all_requests.php"  >WASTE PICKUP REQUESTS</a></li>
							
							<li><a href="add_new_truck.php" class="menu-top-active">NEW TRUCK</a></li>
							<li><a href="sanitation_reg.html" >NEW WORKER</a></li>
							<li><a href="all_trucks.php" >TRUCKS LIST</a></li>
							<li><a href="all_workers.php" >WORKERS LIST</a></li>
							
						
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
					<h4 class="header-line">Admin <?php echo $_SESSION['login_user']['Pin_Code'];?>: Truck Registration</h4>
					
				</div>

			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							Add New Truck
							<center></div>
								<div class="panel-body">
									<form role="form" action="new_truck.php" method="POST">
										<div class="form-group">
											<label>Vehicle Number</label>
											<input class="form-control" type="text" name="vehicle" id = "vehicle" placeholder="Enter Vehicle Number"/>
										</div>
										<div class="form-group">
											<label>Vehicle Capacity (in kgs)</label>
											<input class="form-control" type ="float" name="capacity" id = "capacity" placeholder="Enter Vehicle Capacity" />

										</div>
										
										<?php
										$worker= array() ;
										$worker_name = array();
										$sql = "SELECT * FROM `sanitation_workers` WHERE `Availability`='A'";
										$data= mysqli_query($con,$sql);
										$i=0 ;
										while($result=mysqli_fetch_assoc($data))
										{
											$worker[$i]=$result['Worker_ID'];
											$worker_name[$i]=$result['Worker_Name'];
											$i = $i+1;
										}
										?>
										
										<label>Choose Worker</label><br>
										<select class="form-control" type ="text" name="worker" id="worker">
											<option value='Select Worker' selected disabled>Assign Worker</option>
											<?php
											for($x=0;$x<$i;$x++)
											{
												echo "<option value=$worker[$x]>$worker_name[$x](Worker ID : $worker[$x])</option>";
											}

											?>
										</select><br>
										<center><button type="submit" class="btn btn-info">Register</button></center>
									</form>								
								</div>
							</div></center>
						</div>
					</div>
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
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
</body>
</html>
