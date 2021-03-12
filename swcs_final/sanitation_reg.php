<?php
session_start();
$conn = mysqli_connect('localhost','root','','swcs');
if(!$conn)
    {echo 'Fail connection to Database - '.mysqli_connect_error();}
    if(empty($_POST['fullname']) || empty($_POST['contact']))
        {echo 'Both fields are required <br />';}
    else
    {     
        //echo htmlspecialchars($_POST['fullname']);   
        //echo htmlspecialchars($_POST['contact']);

        $id = rand (100,1000);    
        $contact = $_POST['contact'];
        $fullname = $_POST['fullname'];
        $sql = "INSERT INTO sanitation_workers(Worker_ID, Worker_Name, Worker_Ph) VALUES ('$id','$fullname','$contact')";  
        //echo "Your Worker ID is $id"; 
        if(mysqli_query($conn, $sql))
        {
            header("Location: all_workers.php");
            mysqli_close($conn);
        }
        else
        {
            echo 'Query error: '. mysqli_error($conn);
        }
    }
    



?>
