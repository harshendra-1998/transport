<?php 
require('nav.php');
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	//echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select * from admin";
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
			<h1>Delete Admin</h1>
			<form action=del_admin.php method=post>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Surname</td>
						<td>Email id</td>
						<td>DELETE button</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td><input type=radio name="a_id" value='.$row["admin_id"].'>'.$row["admin_id"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["surname"].'</td>
						<td>'.$row["email"].'</td>
						<td><input type=submit name=submit value=delete></td>
					</tr>';
					
			}
			
			echo '</table>
					</form>
					<b><a href="homepage.php">go back</a></b></div>
					';
			
					
		}
		if(isset($_POST['submit']))
			{
					$sql="DELETE FROM admin WHERE admin_id='$_POST[a_id]'";
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
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
require('../footer.php');

?>
