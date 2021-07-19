<!DOCTYPE HTML>

<html lang ="en">

<head>
	<meta charset="utf-8" />
	<title>Admin Login</title>
	<link rel="stylesheet" href="admin_login.css">
</head>

<body>
	<br>
	<header>Admin Login</header>
	<br><br><br><br>
	
	<div class="form">
		<form action="admin_login.php" method="post">     
			<br> 
				<!--<label for="pincode"><b>Pin Code</b></label>
				<input type="text" placeholder="Enter Pin Code" name="pincode" required>-->

				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>
				<span id="error"></span>
				<br>
				<button type="submit">Login</button>
				<br>

				
				<br><br>
			</form>
		</div>
		<br><br>
		<a class="btn_home" href="home_page.html">Home</a>

</body>
</html>

<?php
if(isset($_POST['uname']))
{

	$server = "localhost" ;
	$username = "root";
	$password = "";

	$con = mysqli_connect($server,$username,$password);
	if(!$con)
	{
		die("Connection to Database failed due to".mysqli_connect_error());
	}
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$myusername = mysqli_real_escape_string($con,$_POST['uname']);
		$mypassword = mysqli_real_escape_string($con,$_POST['psw']); 
						// echo $myusername . "<br>";
						// echo $mypassword . "<br>";

		$sql = "SELECT * FROM `swcs`.`area_admin` WHERE `Admin_email` = '$myusername' and `Admin_Password` = '$mypassword'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		if($count == 1) 
		{

			$userdetails = array('Admin_Name'=>$row['Admin_Name'],'Admin_Ph'=>$row['Admin_Ph'],'Pin_Code'=>$row['Pin_Code'],'Area_Name'=>$row['Area_Name'],'Admin_email'=>$row['Admin_email']);
			$_SESSION['login_user'] = $userdetails;

				// echo "Login Successful. Redirecting to Dashboard";
			header("location:admin_dashboard.php");
		} 
		else
		{
			echo '<script>var error = document.getElementById("error")
			error.textContent = "Invalid Username or Password"
			error.style.color = "red" 
			</script>';
		}
	}
	else
	{
		header("location:admin_login.html");
	}
}

?>