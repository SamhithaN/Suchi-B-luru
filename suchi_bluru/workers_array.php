<?php
$worker= array() ;
$worker_name = array();
$sql = "SELECT * FROM `sanitation_workers` WHERE `Availability`='A'";
$data= mysqli_query($con,$sql);
$i=0 ;
while($result=mysqli_fetch_assoc($data))
{
	$worker[$i]=$result['Worker_ID'];
	$worker_name[$i]=$result['Worker_Name'];
	$i = $i+1;
}
?>		