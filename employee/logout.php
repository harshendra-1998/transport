<?php 
session_start();

if(isset($_SESSION['user']))
{
	session_destroy();
	echo "<link rel="stylesheet" type="text/css"href="ccc.css"><h2>You logged out";
	echo "<br><a href='index.php'>Employee Login</a>";
	echo "<br><a href='../index.php'>Other Login</a>";
}
else
{
	echo "please login to contine";
}
?>