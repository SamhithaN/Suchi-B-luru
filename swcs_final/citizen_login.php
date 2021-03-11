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
            echo "Incorrect Username or password.<br>";
         
          
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
        
        }
        else{
            echo "Something is not right";
        }
       
    ?>    
    
        
