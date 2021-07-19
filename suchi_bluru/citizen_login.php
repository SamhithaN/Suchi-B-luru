<!DOCTYPE HTML>

<html lang ="en">

<head>
	<meta charset="utf-8" />
	<link rel="icon" href="https://image.flaticon.com/icons/png/512/401/401126.png" type="image/gif" />
	<title>Citizen Login</title>
	<link rel="stylesheet" href="citizen_login.css">
</head>

<body>
	<br>
	<header>Citizen Login</header>
	<br><br><br>
	<div class="form">
		<form action="citizen_login.php" method="POST">
			<div class="container" >
				<label for="uname"><b>Username</b></label>
					<input type="text" placeholder="Enter Email-ID" id = "username" name="uname" required>
				<br>
				<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" id = "password" name="psw" required>
				<span id = "error"></span>
				<button type="submit">Login</button>
				<br>
				
			</div>
		</form>
	</div>
	<br><br><br><br>
	<a class="btn_home" href="home_page.html">Home</a>
</body>

<script>
		function errorMessage() {		
				
		}
</script>
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
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$myusername = mysqli_real_escape_string($con,$_POST['uname']);
		$mypassword = mysqli_real_escape_string($con,$_POST['psw']); 
		//echo "Incorrect Username or password.<br>";		

		$sql = "SELECT `fname`,`lname`,`green_points`,`email`,`phone_no` FROM `swcs`.`citizen_user` WHERE `email` = '$myusername' and `password` = '$mypassword'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		//  echo $count;
		if($count == 1) 
		{
					
			$userdetails = array('fname'=>$row['fname'],'lname'=>$row['lname'],'points'=>$row['green_points'],'email'=>$row['email'],'num'=>$row['phone_no']);
			$_SESSION['login_user'] = $userdetails;
			$_SESSION['login_user']['login_status'] = 'Login Successful';
				
			header("location:citizen_dashboard.php");
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
		header("location:citizen_login.html");
	}	
				 
?> 
