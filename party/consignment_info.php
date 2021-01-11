<?php 
require('nav.php');
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	$user=$_SESSION['user'];
	$sql1="select * from party where username='$user'";
	$run1=mysqli_query($con,$sql1);
	if($run1)
	{
		while($row=$run1->fetch_assoc())
		{
			$id=$row['party_id'];
		}
	}
	    $sql="select * from goods where party_id='$id'";
	    $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			<link rel="stylesheet" type="text/css"href="ccc.css">
			</head>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Type</td>
						<td>Weight</td>
						<td>rate</td>
						<td>Total amount</td>
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row["goods_id"].'</td>
						<td>'.$row["type"].'</td>
						<td>'.$row["weight"].'</td>
						<td>'.$row["rate"].'</td>
						<td>'.$row["total_amt"].'</td>
					</tr>';
			}
			echo '</table>';
		}

}
echo '<a href="homepage.php">go back</a>';
?>