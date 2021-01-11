<?php 
require "nav.php";
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select * from emp where username='$user'";
	    $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			<link rel="stylesheet" type="text/css"href="ccc.css">
			</head>
			<div class=container>
			<table border="1">
					<tr>
						<td>Id</td>
						<td>Name</td>
						<td>Email id</td>
						<td>Address</td>
						<td>Contact</td>
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row["emp_id"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["email"].'</td>
						<td>'.$row["address"].'</td>
						<td>'.$row["contact_no"].'</td>
					</tr>';
			}
			echo '</table>
			     </div>
				 </html>';
		}
	
}
echo '<a href="homepage.php">go back</a>';
?>