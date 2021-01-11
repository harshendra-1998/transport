<?php 
require('nav.php');
session_start();
include('../connection.php');

if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user']."<br>";
	//if(isset($_GET['xyz']))
	//{
		$user=$_SESSION['user'];
	    $sql="select * from party where username='$user'";
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
						<td>Name</td>
						<td>Surname</td>
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr><td>'.$row["name"].'</td><td>'.$row["surname"].'</td></tr>';
			}
			echo '</table>
			</div>';
		}
	//}

}

echo '<a href="homepage.php">go back</a>';
?>