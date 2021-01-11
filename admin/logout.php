<?php 
session_start();

if(isset($_SESSION['user']))
{
	session_destroy();
	/*echo '<html>
					<head>
					<link rel="stylesheet" type="text/css" href="../nav.css">
					</head>
					<body>';*/
					
	 echo "<h2>You logged out";
	echo "<br><link rel="stylesheet" type="text/css"href="ccc.css">
			
	<a href='index.php'>Admin Login</a>
	<br><a href='../index.php'>Other Login</a>";
   /* include('../index.php');
	echo '
	</body></html>';*/
	}
?>