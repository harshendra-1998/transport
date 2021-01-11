<?php 
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
		$user=$_SESSION['user'];
	    $sql="select * from vehicle";
	   $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			</head>
			<link rel="stylesheet" type="text/css"href="ccc.css">
			<div class=container>
			<h1>Update Vehicle</h1>
			<form action=vehicle_update.php method=post>
			<table border="1">
					<tr>
					<td>Vehicle Id</td>
					<td>Vehicle No</td>
					<td>Vehicle Owner</td>			
					<td>Insurance date</td>
					<td>Fitness date</td>
					<td>Tax date</td>
					<td>Permit date</td>
					<td>Puc date</td>
					<td>Permit state</td>					
					<td>Service date</td>
					<td>Driver name</td>
					<td>Driver contact</td>
					<td>DELETE button</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
					<td><input type=radio name="v_id" value='.$row["vehicle_id"].'>'.$row["vehicle_id"].'</td>
					<td>'.$row["vehicle_no"].'</td>
					<td>'.$row["vehicle_owner"].'</td>
					<td>'.$row["insurance_date"].'</td>
					<td>'.$row["fitness_date"].'</td>
					<td>'.$row["tax_date"].'</td>
					<td>'.$row["permit_date"].'</td>
					<td>'.$row["puc_date"].'</td>
					<td>'.$row["permit_state"].'</td>
					<td>'.$row["service_date"].'</td>
					<td>'.$row["driver_name"].'</td>
					<td>'.$row["driver_contact"].'</td>
					<td><input type=submit name=submit value=update></td>
					</tr>';
					
			}
			
			echo '</table>
					</form>
					<a href="homepage.php">go back</a>
					
					</html>';
			
				
		} 
		if(isset($_POST['submit']))
			{
					$id=$_POST['v_id'];
					$sql="select * from vehicle where vehicle_id='$id'";
					/*$sql="select cust.name as custname,party.name as partyname,vehicle.vehicle_no as vehiclenumber,orders.* from orders 
							JOIN cust on orders.cust_id=cust.cust_id 
							JOIN vehicle on orders.vehicle_id=vehicle.vehicle_id
							JOIN party on orders.party_id=party.party_id where order_id='$id'
							";*/
					$run=mysqli_query($con,$sql);
					if($run)
					{
						echo "<form action='vehicle_update.php' method='post'>";
						while($row=$run->fetch_assoc())
						{
							echo '<input type="hidden" name="id" value="'.$_POST['v_id'].'" readonly><br>
							Vehicle no<input class=field type="text" name="vehicle_no" value="'.$row['vehicle_no'].'" readonly><br>
							Vehicle owner<input class=field type="text" name="vehicle_owner" value="'.$row['vehicle_owner'].'" readonly><br>
							Insurance date<input class=field type="date" name="insurance_date" value='.$row['insurance_date'].'><br>
							Fitness date<input class=field type="date" name="fitness_date" value='.$row['fitness_date'].'><br>
							Tax date<input class=field type="date" name="tax_date" value='.$row['tax_date'].'><br>
							Permit date<input class=field type="date" name="permit_date" value='.$row['permit_date'].'><br>
							Permit state<input class=field type="text" name="permit_state" value="'.$row['permit_state'].'"><br>
							Service date<input class=field type=date name="service_date" value="'.$row['service_date'].'"><br>
							Driver name<input class=field type=text name="driver_name" value="'.$row['driver_name'].'"><br>
							Driver contact<input class=field type=text name="driver_contact" value="'.$row['driver_contact'].'"><br>
							
							<input class=btn-submit type=submit name="submit1" value="update">';	
						}
						//echo $sql;
						echo '</form>
						</div>
                        </body>
							</html>
						';
						
						
					}
					else
					{
						echo $sql;
					}
					
			}
			if(isset($_POST['submit1']))
						{
							$id=$_POST['id'];
							$sql1="update vehicle set vehicle_no='$_POST[vehicle_no]',
							vehicle_owner='$_POST[vehicle_owner]',
							insurance_date='$_POST[insurance_date]',
							fitness_date='$_POST[fitness_date]',
							tax_date='$_POST[tax_date]',	
							permit_date='$_POST[permit_date]',
							permit_state='$_POST[permit_state]',
							service_date='$_POST[service_date]',
							driver_name='$_POST[driver_name]',
							driver_contact='$_POST[driver_contact]'
							where vehicle_id='$id'";
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


?>
