<?php 
require('nav.php');
require "../connection.php";
session_start();
if(isset($_SESSION['user']))
{
	//echo 'WELCOME    '.$_SESSION['user'].'<br><br>';
	$user=$_SESSION['user'];
	    
		$sql="select party.name as partyname,goods.* from goods
		      JOIN party on goods.party_id=party.party_id";
	    $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="../style.css">
			<link rel="stylesheet" type="text/css"href="ccc.css">
			</head>
				<font color="white">Goods Table</font>
			<table border="1">
					<tr>
						<td>ID</td>
						<td>Party</td>
						<td>Type</td>
						<td>Weight</td>
						<td>rate</td>
						<td>Total amount</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row["goods_id"].'</td>
						<td>'.$row["partyname"].'</td>
						<td>'.$row["type"].'</td>
						<td>'.$row["weight"].'</td>
						<td>'.$row["rate"].'</td>
						<td>'.$row["total_amt"].'</td>
						
					</tr>';
			}
			echo '</table><br><br>
			';
			//echo $sql;
			
		}
		
		$sql1="select * from cust";
		$run1=mysqli_query($con,$sql1);
		if($run1)
		{
		    echo '
			<font color="white">Employee Table</font>
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
		
		/*echo '<form method=post action=consignment_info.php>
				order to be placed(ID)<input type=text 	name=order>
				customer ID<input type=text 	name=order>
				<input type=submit name=submit>
			</form>
				';*/
	

}
echo '<a href="homepage.php">go back</a>';
?>