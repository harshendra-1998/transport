<?php 
require "../connection.php";
require('nav.php');
session_start();
if(isset($_SESSION['user']))
{
	//echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select * from emp";
	   $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<br>
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			</head>
			<link rel="stylesheet" type="text/css"href="ccc.css">
			<div class=container>
			<h1>Delete Employee</h1>
			<form action=del_emp.php method=post>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Surname</td>
						<td>Email id</td>
						<td>Delete button</td>
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td><input type=radio name="e_id" value='.$row["emp_id"].'>'.$row["emp_id"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["surname"].'</td>
						<td>'.$row["email"].'</td>
						<td><input type=submit name=submit value=delete></td>
					</tr>';
					
			}
			
			echo '</table>
					</form>
					<b><a href="homepage.php">go back</a></b>
					</div>
					</html>
					';
			
					
		}
		if(isset($_POST['submit']))
			{
					$sql="DELETE FROM emp WHERE emp_id='$_POST[e_id]'";
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