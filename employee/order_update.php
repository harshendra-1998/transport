<?php 
require('nav.php');
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select vehicle.vehicle_no as vehicle_number,cust.name as custname,party.name as partyname,orders.* from orders 
							JOIN cust on orders.cust_id=cust.cust_id 
							JOIN party on orders.party_id=party.party_id
							JOIN vehicle on orders.vehicle_id=vehicle.vehicle_id";
	   $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head><link rel="stylesheet" type="text/css"href="ccc.css"><div class=container>
<h1>Order Update</h1>
			<form action=order_update.php method=post>
			<table border="1">
					<tr>
						<td>Order Id</td>
						<td>Customer Id</td>
						<td>Customer Name</td>
						
						<td>Party Id</td>
						<td>Party Name</td>
						<td>Vehicle id</td>
						<td>Vehicle number</td>
						<td>Delivery date</td>
						<td>Dispatch Date</td>
						<td>Delivery status</td>
						<td>Dispatch Status</td>
						
						<td>DELETE button</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td><input type=radio name="o_id" value='.$row["order_id"].'>'.$row["order_id"].'</td>
						<td>'.$row["cust_id"].'</td>
						<td>'.$row["custname"].'</td>
						<td>'.$row["party_id"].'</td>
						<td>'.$row["partyname"].'</td>
						<td>'.$row["vehicle_id"].'</td>
						<td>'.$row["vehicle_number"].'</td>
						<td>'.$row["delivered_date"].'</td>
						<td>'.$row["dispatch_date"].'</td>
						<td>'.$row["delivered"].'</td>
						<td>'.$row["dispatch"].'</td>
						
						<td><input type=submit name=submit value=update></td>
					</tr>';
					
			}
			
			echo '</table>
					</form>';
			
					
		}
		if(isset($_POST['submit']))
			{
					$id=$_POST['o_id'];
					$sql="select cust.name as custname,party.name as partyname,vehicle.vehicle_no as vehiclenumber,orders.* from orders 
							JOIN cust on orders.cust_id=cust.cust_id 
							JOIN vehicle on orders.vehicle_id=vehicle.vehicle_id
							JOIN party on orders.party_id=party.party_id where order_id='$id'
							";
					$run=mysqli_query($con,$sql);
					if($run)
					{
						echo "<form action='order_update.php' method='post'>";
						while($row=$run->fetch_assoc())
						{
							echo '
							Order id<input type="text" name="order_id" value='.$row['order_id'].' readonly><br>
							Cust id<input type="text" name="cust_id" value='.$row['cust_id'].' readonly><br>
							Cust name<input type="text" name="cust_name" value='.$row['custname'].' readonly><br>
							Party id<input type="text" name="party_id" value='.$row['party_id'].' readonly><br>
							Party name<input type="text" name="party_name" value='.$row['partyname'].' readonly><br>
							Vehicle id<input type="text" name="vehicle_id" value='.$row['vehicle_id'].' readonly><br>
							Vehicle number<input type="text" name="vehicle_no" value="'.$row['vehiclenumber'].'" readonly><br>
							*Dispatch date<input type=date name="dispatch_date" value="'.$row['dispatch_date'].'"><br>
							Delivery date<input type=date name="dispatch_date" value="'.$row['dispatch_date'].'" readonly><br>
							
							*Dispatch of product
							<select name="goods_dispatch">
							<option value="'.$row['dispatch'].'">'.$row['dispatch'].'</option>
							<option value="yes">yes</option>
							<option value="no">no</option>
							</select><br>
							
							Delivery of product<input type=text name="goods_delivered" value="'.$row['delivered'].'" readonly><br>
							
							<input type=submit name="submit1">';	
						}
						//echo $sql;
						echo '</form></div>';
						
						
						
					}
					else
					{
						echo $sql;
					}
					
			}
			if(isset($_POST['submit1']))
						{
							$sql1="update orders set dispatch='$_POST[goods_dispatch]',dispatch_date='$_POST[dispatch_date]' where order_id='$_POST[order_id]'";
							$run1=mysqli_query($con,$sql1);
					if($run1)
					{
						
						echo "Order Updated";
					}
					else
					{
						echo"error";
					}
						}
						
	
}
echo '<a href="homepage.php">go back</a>';

?>
