<?php
require('nav.php');
session_start();
include('../connection.php');

if(isset($_SESSION['user']))
{
$user=$_SESSION['user'];
$sql="select * from cust where username='$user'";
$run=mysqli_query($con,$sql);
if($run)
{
	echo '
	<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css"href="ccc.css">
</head>
<div class=container>
	<form action="edit.php" method="post">';
	while($row=$run->fetch_assoc())
	{
		echo 'Name <input class=field type=text name=name value='.$row['name'].'><br>
		Surname <input class=field type=text name=surname value='.$row['surname'].'><br>
		
		Address <input class=field type=text name=address value='.$row['address'].'><br>
		Contact no <input class=field type=text name=contact_no value='.$row['contact_no'].'><br>';
	}
	
	echo '  <input class=btn-submit type=submit name=submit value=update>
			</form>
			</div>';
			
			if(isset($_POST['submit']))
			{
				$sql="update cust set name='$_POST[name]',surname='$_POST[surname]',address='$_POST[address]',contact_no='$_POST[contact_no]' where username='$user'";
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
}
else
{
echo "PLease login to continue";
}
	
echo '<a href="homepage.php">go back</a>';
?>