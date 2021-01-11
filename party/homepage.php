<?php 
session_start();
include('../connection.php');

if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'];
	require 'nav.php';

}
else
{
	echo "please login to continue";
}

?>