<?php
session_start();
include('../connection.php');
if(isset($_SESSION['user']))
{
	$xyz=$_SESSION['user'];
	$sql="select * from admin where username='$xyz'";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		while ($row=$run->fetch_assoc())
		{
			echo $row["email"];
		}
	}
	require 'nav.php';
}
else
{
echo "PLease login to continue";
}

?>