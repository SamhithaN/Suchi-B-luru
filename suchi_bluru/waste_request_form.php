<?php
session_start();
if(isset($_SESSION['login_user']))
{

    $server = "localhost" ;
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);
    mysqli_select_db($con, "swcs");
    if(!$con)
    {
        die("Connection to Database failed due to".mysqli_connect_error());
    }

    $t = time();
    $email = $_SESSION['login_user']['email'];
    $waste_type = $_POST["waste_type"];
    $add1 = $_POST["add1"];
    $pincode = $_POST["pincode"];
    $category = $_POST["waste"];
    $weight = $_POST["weight"];
    
    $status = "In Process";
    $sql1 = "INSERT INTO `swcs`.`waste_pickup_request` (`Request_ID`,`Pickup_Address`, `Pickup_Date`, `Status`, `user_email`, `Pin_code`) VALUES ('$t','$add1', date_add(now(),interval 1 day), '$status', '$email', '$pincode');";
    $credit_sql = "SELECT `Credit/kg` FROM `swcs`.`green credits` WHERE `Category` = '$category' ";
    $result = mysqli_query($con, $credit_sql);
    $row =$result->fetch_assoc(); 
    $credits =intval(intval($row['Credit/kg'])*$weight) ;
  //  echo $credits . "<br>";
    $sql2 = "INSERT INTO `swcs`.`waste` (`Request_ID`, `Waste Type`, `Waste_Category`, `Waste_Weight`, `Waste_Credit`) VALUES ('$t', '$waste_type', '$category', '$weight', '$credits');";
    $user_credits = "SELECT * FROM `citizen_user` where `email`='$email'";
    $execute = mysqli_query($con, $user_credits);
    $u_c=mysqli_query($con, $user_credits);
    $res_c=$u_c->fetch_assoc();
    $current_total = intval($res_c['green_points']);
    //stored procedure
    $proc = "CALL add_credit($credits,$current_total,'$email')";
    $execute_proc = mysqli_query($con, $proc);
    
    if($con->query($sql1)==true )
    {
        if($con->query($sql2)==true )
        {
            if($con->query($user_credits))
            {
                if($con->query($proc)==true)
                {   
                    header("Location: history.php");
                }
                else
                {
                    echo "Error $con->error";
                } 
            }
            else
            {
                echo "Error $con->error";
            } 
        }
        else{
            echo "Error $con->error";
        }  
    }

    else{
        echo "Error $con->error";
    } 
}
?>