<?php 
require('nav.php');
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
	echo 'WELCOME   '.$_SESSION['user'].'<br>';
	//if(isset($_GET['xyz']))
	//{
		echo '
		<html>
		<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<link rel="stylesheet" type="text/css"href="ccc.css">
		</head>
		<div class=container>
		<h1>Change Password</h1>
		<form method="post" action="change_pass.php">
		username<input class=field type=text name=username value='.$user.' readonly><br>
		change password<input class=field type=password name="password" required><br>
		confirm password<input class=field type=password name="confirm_password" required><br>
		<input class=btn-submit type=submit name=submit>
		</form>
		</div>
		';
	//}
	if(isset($_POST['submit']))
	{
		$sql="update party set password='$_POST[password]' where username='$_POST[username]'";
		$run=mysqli_query($con,$sql);
		if($run)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
}
echo '<a href="homepage.php">go back</a>';
?>