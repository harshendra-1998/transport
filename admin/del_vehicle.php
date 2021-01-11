<?php 
require "../connection.php";
require('nav.php');
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select * from vehicle";
	   $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			</head>
			<link rel="stylesheet" type="text/css"href="ccc.css">
			
			<div class=container>
			<h1>Delete Vehicle</h1>
			<form action=del_vehicle.php method=post>
			<br>Vehicle details
			<table border="1">
					<tr>
						<td>Id</td>
						<td>Vehicle no</td>
						<td>Vehicle owner</td>
						<td>DELETE button</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td><input type=radio name="v_id" value='.$row["vehicle_id"].'>'.$row["vehicle_id"].'</td>
						<td>'.$row["vehicle_no"].'</td>
						<td>'.$row["vehicle_owner"].'</td>
						
						<td><input type=submit name=submit value=delete></td>
					</tr>';
					
			}
			
			echo '</table>
					</form>
					<a href="homepage.php">go back</a>
					</div>
					</html>';
			
					
		}
		if(isset($_POST['submit']))
			{
					$sql="delete from vehicle where vehicle_id='$_POST[v_id]'";
					$run=mysqli_query($con,$sql);
					if($run)
					{
						echo $sql;
						echo "success";
					}
					else
					{
						echo $sql;
						echo"error";
					}
			}
	

}

?>