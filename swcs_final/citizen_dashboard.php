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
		<meta name="description" content="" />
		<meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>CITIZEN DASHBOARD</title>
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
					<a class="btn_home" href="citizen_dashboard.php">
					CITIZEN DASHBOARD
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
			<div class="row ">
				<div class="col-md-12">
					<div class="navbar-collapse collapse ">
						<ul id="menu-top" class="nav navbar-nav navbar-right">
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
				<div class="col-md-4 col-sm-3 col-xs-6">
					<div class="alert alert-warning back-widget-set text-center">
						<i class="fa fa-briefcase fa-5x"></i>
						<h3><?php echo  $_SESSION['login_user']['email'] ?></h3>
						Email-ID
					</div>
				</div>
				<div class="col-md-4 col-sm-3 col-xs-6">
					<div class="alert alert-danger back-widget-set text-center">
						<i class="fa fa-phone fa-5x"></i>
						<h3><?php echo $_SESSION['login_user']['num'] ?></h3>
						Phone Number
					</div>
				</div>

				<div class="col-md-4 col-sm-3 col-xs-6">
					<div class="alert alert-success back-widget-set text-center">
						<i class="fa fa-leaf fa-5x"></i>
						<h3><?php echo  $row['green_points'] ?></h3>
						Green Points Earned
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
<?php } ?>