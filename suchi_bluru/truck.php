<?php
    include("config.php");
    mysqli_select_db($con, "swcs");
    session_start();
    $pincode = $_SESSION['login_user']['Pin_Code'];
    $weight = $_SESSION['login_user']['weight'];
    $status = $_SESSION['login_user']['status'];
    $vehicle = $_POST['truck'];
    $sql = "SELECT * FROM `truck` WHERE `Vehicle_No`= '$vehicle'";
    $data = mysqli_query($con,$sql);
    $result=mysqli_fetch_assoc($data);
    $cap_left = $result['Capacity_Left'];
    $r_id=$_SESSION['login_user']['r_id'];
    if($cap_left-$weight>=0 and $status == 'In Process')
    {
        $update = "UPDATE `truck` SET `Capacity_Left`=$cap_left-$weight WHERE `Vehicle_No`='$vehicle'";
        $status_up = "UPDATE `waste_pickup_request` SET `Status`='Vehicle Assigned' WHERE `Request_ID`='$r_id'";
        $vehicle_up = "UPDATE `waste_pickup_request` SET `Vehicle_No`='$vehicle' WHERE `Request_ID`='$r_id'";
        $exec = mysqli_query($con,$update);
        $exec = mysqli_query($con,$status_up);
        $exec = mysqli_query($con,$vehicle_up);
        if($cap_left-$weight==0)
        {
            $na = "UPDATE `truck` SET `Availability`='NA' WHERE `Vehicle_No`='$vehicle'";
        }
        $_SESSION['login_user']['message']="Truck assigned successfully<br>";
        header("Location:pending_requests.php");
        
    }
    else
    {
        //echo "Selected Truck cannot be assigned, not enough capacity remaining. <br>";
        $_SESSION['login_user']['message']="Selected Truck cannot be assigned, not enough capacity remaining. <br>";
        header("Location:pending_requests.php");

    }
?>
