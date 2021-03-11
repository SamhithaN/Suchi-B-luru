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
?>

