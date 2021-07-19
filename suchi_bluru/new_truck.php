<?php 
include("config.php");
mysqli_select_db($con, "swcs");
session_start();

    $pincode = $_SESSION['login_user']['Pin_Code'];
    $worker_id = $_POST['worker'];
    $vehicle = $_POST['vehicle'];
    $capacity = $_POST['capacity'];
    //check if truck exists
    $check = "SELECT * FROM `truck` WHERE `Vehicle_No`='$vehicle'";
    $result = mysqli_query($con, $check);
    $count = mysqli_num_rows($result);
    if($count == 0)
    {
        $sql1 = "INSERT INTO `truck`(`Vehicle_No`, `Pin_Code`, `Capacity`, `Capacity_Left`, `Driver_ID`, `Availability`) VALUES ('$vehicle','$pincode','$capacity','$capacity','$worker_id','A')";
        $sql2 = "UPDATE `sanitation_workers` SET `Availability`='NA' WHERE `Worker_ID`='$worker_id'";
        if($con->query($sql1)==true )
        {
            if($con->query($sql2)==true )
            {
                header("Location:all_trucks.php");
            }
            else
            {
                echo "Error $con->error";
            } 
        }
    }
    
    else
    {
        echo '<script>alert("Truck Already Exists !")
        window.location = "add_new_truck.php"</script>';
    }  
?>

