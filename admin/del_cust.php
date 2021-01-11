<?php 
require "../connection.php";
require('nav.php');
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select * from cust";
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
			<h1>Delete Customer</h1>
			<form action=del_cust.php method=post>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Surname</td>
						<td>Email id</td>
						<td>Contact</td>
						<td>DELETE button</td>
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td><input type=radio name="c_id" value='.$row["cust_id"].'>'.$row["cust_id"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["surname"].'</td>
						<td>'.$row["email"].'</td>
						<td>'.$row["contact_no"].'</td>
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
					$sql="DELETE FROM cust WHERE cust_id='$_POST[c_id]'";
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
	include ('../footer.php');
?>