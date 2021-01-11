<?php 
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	require 'nav.php';
}
else
{
	echo "Please login";
}
?>