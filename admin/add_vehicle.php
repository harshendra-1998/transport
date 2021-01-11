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
			<b>
			<link rel="stylesheet" type="text/css"href="ccc.css">
			<div class=container>
			<h1>Add Vehicle</h1>
<form method=POST action="add_vehicle.php">

<input class=field type=text name=vehicle_no placeholder="Vehicle no"required>
<br>
<input class=field type=text name="permit_state" placeholder="Permit state: "required>
<br>
Insurance date:<input class=field type=date name="insurance_date" placeholder="" required>
<br>
 Fitness date:<input class=field type=date name="fitness_date" placeholder="" required>
<br>
 Tax date:<input class=field type=date name="tax_date" placeholder="" required>
<br>
 Permit date:<input class=field type=date name="permit_date" placeholder="" required>
<br>
PUC date: <input class=field type=date name="puc_date" placeholder="" required>
<br>

<input class=field type=text name=vehicle_owner placeholder="Vehicle owner:" required>
<br>
Service date:<input class=field type=date name="service_date" placeholder="" required>
<br>
<input class=field type=text name=driver_name placeholder="Driver name:" required>
<br>
<input class=field type=text name=driver_contact placeholder="Driver contact:" required>
<br>


<input class=btn-submit type=submit name=submit value=submit>
</form>
<a href="homepage.php">go back</a>
</div>
</b>
</body>

</html>';

if(isset($_POST['submit']))
{
    $sql="INSERT INTO vehicle  VALUES ('','$_POST[vehicle_no]','$_POST[insurance_date]','$_POST[fitness_date]','$_POST[tax_date]','$_POST[permit_date]','$_POST[puc_date]','$_POST[permit_state]','$_POST[vehicle_owner]','$_POST[service_date]','$_POST[driver_name]','$_POST[driver_contact]')";

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