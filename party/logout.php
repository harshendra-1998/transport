<?php 
session_start();

if(isset($_SESSION['user']))
{
	session_destroy();
	echo "<h2>You logged out";
	echo "<br><a href='index.php'>Party Login</a>
			<br><a href='../index.php'>Other Login</a>";
}
else
{
	echo "please login to contine";
}
?>