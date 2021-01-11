<?php
require('nav.php');
session_start();
include('../connection.php');

if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
	$id=$_SESSION['id'];

	
echo '
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<link rel="stylesheet" type="text/css"href="ccc.css">
<div class=container>
<h1>Add Goods</h1>
<form method=POST action="add_goods.php">

Goods Id:<input class=field type="text" name="goods_id">
<br>
Type:<input class=field type=text name=type required>
<br>
Weight:<input class=field type=text name=weight required>
<br>
Rate:<input class=field type=text name=rate required>
<br>
Total: <input class=field type=text name="total" required>
<br>

<input class=btn-submit type=submit name=submit value="add_goods">
</form>

</div>
</body>

</html>';

if(isset($_POST['submit']))
{
    $sql="INSERT INTO goods  VALUES ('','$_POST[type]','$_POST[weight]','$_POST[rate]','$_POST[total]','$id')";

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
	
echo '<a href="homepage.php">go back</a>';
?>