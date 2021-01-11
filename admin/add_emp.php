<?php
require('nav.php');
session_start();
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
<h1>Add Custommer</h1>

<form method=POST action="add_emp.php">
<input class=field type=text name=username placeholder="Username:" required>
<br>
<input class=field type=password name=password placeholder="Password:" required>
<br>
<input class=field type=email name=email placeholder="Email Id:" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>

<br>
<input class=field type=text name=name placeholder="Name:" pattern="[a-zA-Z\s]+" title="Enter valid name" required>
<br>
<input class=field type=text name=address placeholder="Address:" required>
<br>
<b>Date of birth:<input class=field type=date name=dob placeholder="" required>
<br>
<input class=field type=text name=lic placeholder="License no:" required>
<br>
<input class=field type=text name=contact placeholder="Contact no:" pattern=".{10,}" title="Enter valid mobile no" required>
<br>
<input class=field type=text name=salary placeholder="Salary:" pattern="[0-9]+" title="Salary should not have characters" required>
<br>
<input class=field type=text name=surname placeholder="Surname:" pattern="[a-zA-Z]" title="Enter valid surname" required>
<br>

<input class=btn-submit type=submit name=submit>
</form>
<a href="homepage.php">go back</a></b>
</div>
</body>
</html>
';

		if(isset($_POST['submit']))
		{
		$sql="insert into emp values('','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[name]','$_POST[address]','$_POST[dob]','$_POST[lic]','$_POST[contact]','$_POST[salary]','$_POST[surname]')";

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
echo "PLease login to continue";
}
	

?>