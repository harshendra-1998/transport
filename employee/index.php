<?php 
include ('../header.php');
session_start();
include('../connection.php');
if(isset($_SESSION['user']))
{
	
	header('location:consignment_info.php');
}
	else
		{



			echo '
					<html>
					<head>
					<link rel="stylesheet" type="text/css" href="../style.css">
					<link rel="stylesheet" type="text/css"href="ccc.css">
					</head>
					<div class=container>
					<form method="post" action="index.php">
			
					Username<input class=field type="text" name="user" required><br>
					Password<input class=field type="password" name="password" required><br>
					<input class=btn-submit type="submit" name="submit" value="login"><br>
					<a href="../index.php">Homepage</a>
					</div>
					</form>';
			

					if(isset($_POST['submit']))
					{
						$username=$_POST['user'];
						$password=$_POST['password'];
						
						$sql="select * from emp where username='$username'";
						$run=mysqli_query($con,$sql);
						if($run)
						{
							while($row=$run->fetch_assoc())
							{	
								if($password==$row["password"])
								{
									$_SESSION['user']=$row["username"];
									header('location:index.php');									
								}
								else
								{
									echo "Password wrong";
								}
							}
						}
						
					}

		}


	
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	include ('../footer.php');

?>