<?php
session_start();
include('../connection.php');
require('nav.php');

if(isset($_SESSION['user']))
{
	
echo '
<br>
<html>
<body>
<head>

<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<link rel="stylesheet" type="text/css"href="ccc.css">
<div class="container">
<h1>Add Admin</h1>
<form method=POST action="add_admin.php">

<input class=field type=text name=username placeholder="Username:" required>
<br>
<input class=field type=password name=password placeholder="Password:" required>
<br>
 <input class=field type=email name="email_id" placeholder="Email Id:" required>
<br>
<input class=field type=text name=name placeholder="Name:" pattern="[a-zA-Z\s] required>
<br>
<input class=field type=text name=surname placeholder="Surname:" pattern="[a-zA-Z]" title="Enter valid surname" required>
<br>

<input class=btn-submit type=submit name=submit value=submit>
</form>
<b><a href="homepage.php">go back</a></b>
</div>
</body>

</html>';

if(isset($_POST['submit']))
{
    $sql="INSERT INTO admin  VALUES ('','$_POST[username]','$_POST[password]','$_POST[email_id]','$_POST[name]','$_POST[surname]')";

	$run=mysqli_query($con,$sql);

	if($run)
	{
	echo "Data added successfully";
	}
	else 
	{
	echo "error";
	}
}
}
else
{
echo "PLease login to continue";
}
	

?>