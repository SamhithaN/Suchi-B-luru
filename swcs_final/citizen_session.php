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
        session_start();
    
        $user_check = $_SESSION['login_user'];
        
        $ses_sql = mysqli_query($con,"select `email` from `swcs`.`citizen_user` where  = '$user_check' ");
        
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        
        $login_session = $row['email'];
        
        if(!isset($_SESSION['login_user'])){
            header("location:citizen_login.php");
            die();
        }
       
   }
    
?>