

<?php

session_start();
require('nav.php');
include('../connection.php');

if(isset($_SESSION['user']))
{


echo '
<br>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<link rel="stylesheet" type="text/css"href="ccc.css">
<div class=container>
<h1>Add Party</h1>
<form method=POST action="add_party.php">
<input class=field type=text name=username placeholder="Username:" required>
<br>
<input class=field type=password name=password placeholder="Password:" required>
<br>
<input class=field type=text name="name" placeholder="Name:" pattern="[a-zA-Z\s] required >
<br>
<input class=field type=text name=surname placeholder="Surname:" required>
<br>
 <input class=field type=text name=address placeholder="Address:" required>
<br>
<input class=field type=text name=contact placeholder="Contact no:" pattern=".{10,}" title="Enter valid mobile no" required>
<br>

<input class=field type=email name=email_id placeholder="Email Id:" required>
<br>

<input class=btn-submit type=submit name=submit value=submit>
</form>
<a href="homepage.php">go back</a>
</div>
</body>
</html>

';

if(isset($_POST['submit']))
{
   $sql="INSERT INTO party  VALUES ('','$_POST[username]','$_POST[password]','$_POST[name]','$_POST[surname]','$_POST[address]','$_POST[contact]','$_POST[email_id]')";

$run=mysqli_query($con,$sql);

if($run)
{
	echo "Data added successfully";
}
else 
{
	echo $sql;
	echo "error";
}
}

}
else 
{
	echo "error";
}
?>