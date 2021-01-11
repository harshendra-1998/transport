<?php 

include('../connection.php');
if(isset($_GET['report']))
{

$a=$_GET['report'];
$file=$a;
$sql="select * from vehicle where vehicle_id='$a'";
  $run=mysqli_query($con,$sql);
	    if($run)
		{
			
			   while($row=$run->fetch_assoc())
						
						{
							$display=
							"Vehicle Report :<br>".
							"Vehicle number :".$row['member_id'].
							"ID       	:".$row['member_id'].
							"Name	  	:".$row['name'].
							"Surname  	:".$row['surname'].
							"DOJ  	  	:".$row['dob'].
							"Phone No.	:".$row['contact_no'].
							"Email Id 	:".$row['email_id'].
							"DOJ  	  	:".$row['doj'].
							"Expiry Date:".$row['fee_till'].
							"Amount Paid:".$row['amount_payable'].
							"Reciever   :".$row['manager_id']							
							;
							
							
							
						}
		
	
				include_once('../dompdf/dompdf_config.inc.php');
	$dompdf =new DOMPDF();
	$dompdf->load_html($display);	
	
	$dompdf->render();
	$dompdf->stream($file);
			
		
			
			
		}
}
?>