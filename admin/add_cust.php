<?php

session_start();
include('../connection.php');
require('nav.php');
if(isset($_SESSION['user']))
{
/*$error = '';
  if(array_key_exists('contact', $_POST))
  {
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['contact']))
    {
      $error = 'Invalid Number!';
    }
  }*/


echo '
<br>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>


<body>
<div class=container>
<h1>Add Custommer</h1>
<link rel="stylesheet" type="text/css"href="ccc.css">
<form method="post" action="add_cust.php">
<input class=field type=text name=name placeholder="Name:" pattern="[a-zA-Z\s] required>
<br>
<input class=field type=text name=surname placeholder="Surname:" pattern="[a-zA-Z\s] required>
<br>
 <input class=field type=text name=address placeholder="Address:" required>
<br>
<input class=field type=text name=contact placeholder="contact no:" pattern=".{10,}" title="Enter valid mobile no" required>
<br>
<input class=field type="password" name=password placeholder="password" required>
<br>
<input class=field type="text" name=username placeholder="username" required>
<br>
<input class=field type=email name=email placeholder="Email:" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
<br>

<input class=btn-submit type=submit name=submit value=submit>
</form>
<b><a href="homepage.php">go back</a></b>
</div>
</body>

</html>';

if(isset($_POST['submit']))
{
    $sql="INSERT INTO cust VALUES ('','$_POST[name]','$_POST[surname]','$_POST[address]','$_POST[contact]','$_POST[password]','$_POST[username]','$_POST[email]')";

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