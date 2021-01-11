<?php 
include ('../header.php');
$msg = '';

session_start();

include('../connection.php');

if(isset($_SESSION['user']))
{
	
	header('location:add_admin.php');
}
	else
		{
			echo '
			<br>
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			</head>
			
			<body  background="../truck2.jpg">
			
			<link rel="stylesheet" type="text/css"href="ccc.css">
			
			<div class=container>
			<h1>Log In</h1>
					<form method="post" action="index.php">
			
					<b><input class=field type="text" placeholder="username" name="user" required><br>
					gggbjg: <input class=field type="password" name="password" placeholder="password" required><br>
					<input class=btn-submit type="submit" name="submit" value="login"><br>
					</form>
					
					<a href="../index.php">Homepage</a></b>
			</div>
			</body>
			</html>		
					';
			

					if(isset($_POST['submit']))
					{
						$username=$_POST['user'];
						$password=$_POST['password'];
						
						$sql="select * from admin where username='$username'";// && password='$password'
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
									//$msg = 'Wrong username or password';
									echo "username or password wrong";
								}
							}
						}
						/*else
						{
						echo "username or password wrong";
						}*/
					}


	}
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	include ('../footer.php');


?>