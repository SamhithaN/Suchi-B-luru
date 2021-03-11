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
            echo $myusername . "<br>";
            echo $mypassword . "<br>";
            $sql = "SELECT * FROM `swcs`.`area_admin` WHERE `Admin_email` = '$myusername' and `Admin_Password` = '$mypassword'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            echo $count;
            if($count == 1) 
            {
              
                $userdetails = array('Admin_Name'=>$row['Admin_Name'],'Admin_Ph'=>$row['Admin_Ph'],'Pin_Code'=>$row['Pin_Code'],'Area_Name'=>$row['Area_Name'],'Admin_email'=>$row['Admin_email']);
                $_SESSION['login_user'] = $userdetails;
                
               // echo "Login Successful. Redirecting to Dashboard";
                header("location:admin_dashboard.php");
            } 
        }
        else{
            echo "something's not right";
        }
        
    }
        
?>