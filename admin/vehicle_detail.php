<?php 
require "../connection.php";
require('nav.php');
session_start();
if(isset($_SESSION['user']))
{
	//echo 'WELCOME    '.$_SESSION['user'].'<br>';
	
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
			<form action=vehicle_detail.php method=post>
			<br><h1>Vehicle details</h1>
			<table border="1">
					<tr>
						<td>Id</td>
						<td>Vehicle no</td>
						<td>Vehicle owner</td>
						<td>Insurance date</td>
						<td>Fitness date</td>
						<td>Tax date</td>
						<td>Permit date</td>
						<td>Puc date</td>
						<td>Permit state</td>
						<td>Service date</td>
						<td>Driver name</td>
						<td>Driver contact</td>
						<td>Create report</td>
						
					</tr>';
		   while($row=$run->fetch_assoc())
			{
				echo '<tr>
						<td><input type=radio name=id value='.$row["vehicle_id"].'></td>
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
						<td><input type=submit name=report value=report></td>
					</tr>';
					
			}
			
			echo '</table>
					</form>
					<li><a href="vehicle_update.php">Edit Vehicle Detail</a></li>
					<li><a href="homepage.php">go back</a></li>
				</div>
					</html>';
			
					
		}
	/*	if(isset($_POST['submit']))
			{
					$sql="delete from vehicle where vehicle_id='$_POST[v_id]'";
					$run=mysqli_query($con,$sql);
					if($run)
					{
						echo $sql;
						echo "success";
					}
					else
					{
						echo $sql;
						echo"error";
					}
			}*/ 
	
if(isset($_POST['report']))
{

$a=$_POST['report'];
$id=$_POST['id'];
$sql="select * from vehicle where vehicle_id='$id'";
  $run=mysqli_query($con,$sql);
	    if($run)
		{
			
			   while($row=$run->fetch_assoc())
						
						{
							$space="&nbsp;&nbsp;";
							$display=
							"<center><b><big><big><big><big><big><big><u>Vehicle Report</u></b></big></big></big></big></big></big><center><br>".
							
							"<br><big><big><big>Vehicle number:".$row['vehicle_no'].
									  "<br>Vehicle owner:".$row['vehicle_owner'].
									  "<br>Insurance date:".$row["insurance_date"].
									  "<br>Fitness date:".$row["fitness_date"].
									  "<br>Tax date:".$row["tax_date"].
									  "<br>Permit date :".$row["permit_date"].
									  "<br>Puc date:".$row["puc_date"].
									  "<br>Permit state:".$row["permit_state"].
									  "<br>Service date:".$row["service_date"].
									  "<br>Driver name :".$row["driver_name"].
									  "<br>Driver contact:".$row["driver_contact"].
							"</big></big></big>"
							;
							
							
							
						}
		
	
				include_once('../dompdf/dompdf_config.inc.php');
	$dompdf =new DOMPDF();
	$dompdf->load_html($display);	
	
	$dompdf->render();
	$dompdf->stream($file);
			
		
			
			
		}
}

}


?>