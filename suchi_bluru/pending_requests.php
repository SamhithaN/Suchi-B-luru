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
 								<div class="logo"> <a href="#">Admin Dashboard</a></div>
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
 							<li><a href="pending_requests.php" class="menu-top-active">PENDING REQUESTS</a></li>
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
 					<h4 class="header-line">Admin <?php echo $_SESSION['login_user']['Pin_Code']; ?> : Pending Requests</h4>
 				</div>
 			</div>
 			<div class="row">
 				<div class="col-md-12">
 					<!-- Advanced Tables -->
 					<div class="panel panel-default">
 						<div class="panel-heading">
 							Pending Requests
 						</div>
 						<div class="panel-body">
 							<div class="table-responsive">
 								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
 									<thead>
 										<tr>
 											<th>Request ID</th>
 											<th>Request Date</th>
 											<th>Pickup Date</th>
 											<th>Pickup Address</th>    
 											<th>Waste Type</th>
 											<th>Waste Category</th>
 											<th>Waste Weight</th>
 											<th>Waste Credit</th>
 											<th>Status</th>
 											<th>Vehicle No.</th>                   
 										</tr>
 									</thead>
 									<tbody>
 										<?php
 										$pincode = $_SESSION['login_user']['Pin_Code'];
 										$sql = "SELECT 
 										`waste_pickup_request`.`Request_ID`,
 										`waste_pickup_request`.`Request_Date`,
 										`waste_pickup_request`.`Pickup_Date`,
 										`waste_pickup_request`.`Vehicle_No`,
 										`waste_pickup_request`.`Pickup_Address`,
 										`waste_pickup_request`.`Pin_code`,
 										`waste_pickup_request`.`Status`,
 										`waste`.`Waste Type`,
 										`waste`.`Waste_Category`,
 										`waste`.`Waste_Weight`,
 										`waste`.`Waste_Credit`
 										from `waste_pickup_request` inner join `waste` 
 										on `waste_pickup_request`.`Request_ID` = `waste`.`Request_ID` and `waste_pickup_request`.`Pin_code`='$pincode' and `waste_pickup_request`.`Status`= 'In Process'";
 										$data= mysqli_query($con,$sql);
 										while($result=mysqli_fetch_assoc($data))
 										{
 											$pin = $result['Pin_code'];
 											$sqltruck = "SELECT * FROM `truck` WHERE `Pin_Code` = $pin ";
 											$truck= mysqli_query($con,$sqltruck);  
 											$_SESSION['login_user']['weight']=$result['Waste_Weight'];
 											$_SESSION['login_user']['status']=$result['Status'];
 											$_SESSION['login_user']['r_id']=$result['Request_ID'];
 											?>
 											<tr>
 												<td><?php echo $result['Request_ID']; ?></td>
 												<td><?php echo $result['Request_Date']; ?></td>
 												<td><?php echo $result['Pickup_Date']; ?></td>
 												<td><?php echo $result['Pickup_Address']; ?></td>
 												<td><?php echo $result['Waste Type']; ?></td>
 												<td><?php echo $result['Waste_Category']; ?></td>
 												<td><?php echo $result['Waste_Weight']; ?></td>
 												<td><?php echo $result['Waste_Credit']; ?></td>
 												<td><?php echo $result['Status']; ?></td>
 												<?php
 												$trucks= array();
 												$caps = array();
 												$i = 0;
 												while($result=mysqli_fetch_assoc($truck))
 												{
 													$trucks[$i]=$result['Vehicle_No'];
 													$caps[$i]=$result['Capacity_Left'];
 													$i = $i+1;
 												}?>

 												<td>
 													<form action='truck.php' method='post'>
 														<select name='truck' id='truck'>
 															<option value='truck' selected disabled>Assign Truck</option> ";
 															<?php for($x=0;$x<$i;$x++)
 															{?>
 																<option value=<?php echo $trucks[$x]; ?>> <?php echo $trucks[$x]; ?> ( <?php echo $caps[$x]; ?> kg ) </option>;
 															<?php } ?>
 														</select>
 														<input type='submit' value='Set'>
 													</form>
 												</td>
 											</tr>
 										<?php }?>
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
 	
 	<!-- BOOTSTRAP SCRIPTS  -->
 	<script src="assets/js/bootstrap.js"></script>
 	<!-- DATATABLE SCRIPTS  -->
 	<script src="assets/js/dataTables/jquery.dataTables.js"></script>
 	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
 	
 </body>
</html>
