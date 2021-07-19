<!DOCTYPE html>

<html lang="en">

<head>
	<title> Citizen Signup </title>
	<link rel="stylesheet" href="citizen_signup.css">
	<link rel="icon" href="https://image.flaticon.com/icons/png/512/401/401126.png" type="image/gif" />
    <script src="citizen_signup_validation.js"></script>
</head>

<body>
	
	<center><header>Citizen Registration</header>
	
	<br><br>
	<h4>Please enter your information for the following fields</h4></center>
	<div class="form">
	<form name = "citizen_signup" action = "citizen_signup.php" onsubmit="return validateForm()" method = "POST">
    <br>
		<label>First Name</label><br>
		<input type ="text" name="fname" id="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>" required>
		<span id = "span_fname"></span>
		<br><br> 
  
		<label>Last Name</label><br>
		<input type ="text" name="lname" id = "lname" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>" required>
		<span id = "span_lname"></span>
        <br><br>
        
        <label>Gender</label><br>
		<input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
		<label for="other">Other</label>
		<br><br>

		<label>Contact number</label><br>
		<input type ="text" name="phone" id = "phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" required>
		<span id = "span_contact"></span>
		<br><br>


		<label>Email ID</label><br>
		<input type ="text" name="email" id = "email" required>
    	<span id = "exists"></span>
		<br><br>

		<label>Create Password</label><br>
		<input type ="password" name="password" id = "password" required>
		<br>
    
    <label>Confirm Password</label><br>
		<input type ="password" name="confirm" id = "confirm" required>
		<span id = "match"></span>
		<br><br>
    <input type="checkbox" onclick="Toggle()">
    <b>Show Password</b>
    <br><br>

		<button type="submit">Submit</button>
	</form>
</div>
<br><br>
  <a class="btn_home" href="home_page.html">Home</a>

</body>

</html>

<?php
if(isset($_POST['email']))
{

    $server = "localhost" ;
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);
    if(!$con)
    {
        die("Connection to Database failed due to".mysqli_connect_error());
    }
    

    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    //$gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //check if user already exists
    $selectsql = "SELECT * FROM `swcs`.`citizen_user` WHERE email = '$email'";
    $result = mysqli_query($con, $selectsql);
    $count = mysqli_num_rows($result);
    if($count == 0)
    {
        $sql = "INSERT INTO `swcs`.`citizen_user` (`email`, `fname`, `lname`, `phone_no`, `green_points`, `password`) VALUES ('$email', '$fname', '$lname', '$phone', '0', '$password')";
        //echo $sql;
        if($con->query($sql)==true)
        {
            //echo "Citizen Registration Successful <br> ";
            header("Location: citizen_login.html");
        }
        else
        {
            echo "Error $con->error";
            header("Location: citizen_signup.html");
        }
    }

    
    else
    {
        echo '<script>var error = document.getElementById("exists")
                error.textContent = "Citizen Account Already Exists"
                error.style.color = "red" 
                </script>';
    }
    
    
}
?>

