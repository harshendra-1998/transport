<?php
require "nav.php";
	require "../connection.php";
	session_start();
	if(isset($_SESSION['user']))
	{
		$user=$_SESSION['user'];
		
		$sql="select * from goods";
	    $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			<link rel="stylesheet" type="text/css"href="ccc.css">
			</head>
			<font color="white">Goods table</font>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Type</td>
						<td>Weight</td>
						<td>rate</td>
						<td>Total amount</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row["goods_id"].'</td>
						<td>'.$row["type"].'</td>
						<td>'.$row["weight"].'</td>
						<td>'.$row["rate"].'</td>
						<td>'.$row["total_amt"].'</td>
						
					</tr>';
			}
			echo '</table><br><br>';
			
			
		}
		
		$sql1="select * from cust";
		$run1=mysqli_query($con,$sql1);
		if($run1)
		{
		    echo '
			<font color="white">Customer table</font>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Surname</td>
						<td>address</td>
						<td>Contact</td>
						
					</tr>';
		   while($row1=$run1->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row1["cust_id"].'</td>
						<td>'.$row1["name"].'</td>
						<td>'.$row1["surname"].'</td>
						<td>'.$row1["address"].'</td>
						<td>'.$row1["contact_no"].'</td>	
					</tr>';
			}
			echo '</table><br><br>';
		}
		
		$sql="select * from vehicle";
	    $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<font color="white">Vehicle table</font>
			<table border="1">
					<tr>
						<td>Vehicle Id</td>
						<td>Vehicle no</td>
						<td>Vehicle owner</td>
						<td>Driver name</td>
						<td>Driver contact</td>
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row["vehicle_id"].'</td>
						<td>'.$row["vehicle_no"].'</td>
						<td>'.$row["vehicle_owner"].'</td>
						<td>'.$row["driver_name"].'</td>
						<td>'.$row["driver_contact"].'</td>
					</tr>';
			}
			echo '</table>';
		}
	}
echo '<div class=container>
		<form method=post action="place_order.php"><br>
		Cust Id<input class=field type=text name=cust_id><br>
		Party Id<input class=field type=text name=party_id><br>
		Goods Id<input class=field type=text name=goods_id><br>
		Vehicle Id<input class=field type=text name=vehicle_id><br>
		Date<input class=field type=date name=order_date><br>
		<input class=btn-submit type=submit name=submit value=submit>
		</form>
		</div>'
		;
		
		if(isset($_POST['submit']))
		{
			$sql1="insert into orders values('','$_POST[cust_id]','$_POST[party_id]','$_POST[goods_id]','$_POST[vehicle_id]','no','no','','','$_POST[order_date]')";
			$run1=mysqli_query($con,$sql1);
			if($run1)
			{
				echo "Order Placed";
			}
			else
			{
				echo "ERROR";
			}
			
		}
	echo '<a href="homepage.php">go back</a>';	

?>