<?php 
require('nav.php');
require "../connection.php";
require("../phpmailer/PHPMailerAutoload.php");

session_start();
if(isset($_SESSION['user']))
{
	
	echo 'WELCOME    '.$_SESSION['user'].'<br><br>';
	
		$user=$_SESSION['user'];
		/*$a="select *from party where username='$user'";
					$run_a=mysqli_query($con,$a);
					if($run_a)
					{
						while($row1=$run_a->fetch_assoc())
						{
							$id=$row1['party_id'];
						}
					}
		*/
		$id=$_SESSION['id'];
		
		$sql="select * from goods";
	    $run=mysqli_query($con,$sql);
	    if($run)
		{
		    echo '
			<html>
			<head>
			<link rel="stylesheet" type="text/css"href="ccc.css">
			<link rel="stylesheet" type="text/css" href="../style.css">
			</head>
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
		    echo '<table border="1">
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
		$sql1="select * from emp";
		$run1=mysqli_query($con,$sql1);
		if($run1)
		{
		    echo '<table border="1">
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Surname</td>
						<td>Email Id</td>
						<td>Contact</td>
						
					</tr>';
		   while($row1=$run1->fetch_assoc())
			{
				echo '<tr>
						<td>'.$row1["emp_id"].'</td>
						<td>'.$row1["name"].'</td>
						<td>'.$row1["surname"].'</td>
						<td>'.$row1["email"].'</td>
						<td>'.$row1["contact_no"].'</td>	
					</tr>';
			}
			echo '</table><br><br>';
		}
		
		echo '
		<div class=container>
		<form method=post action=place_order.php>
				Order to be placed(ID)<input class=field type=text name=goods><br>
				Rate<input class=field type=text name=rate><br>
				Customer ID<input class=field type=text 	name=cust><br>
				Employee Email<input class=field type=email name=email><br>
				<input class=btn-submit type="submit" name="place_order">
				</form>
				';
				if(isset($_POST['place_order']))
				{
					
					$goods=$_POST['goods'];
					$cust=$_POST['cust'];
					$email=$_POST['email'];
					$rate=$_POST['rate'];
					$date=date("l jS \of F Y h:i:s A");

			 

					$mail=new PHPMailer();
					$mail->isSMTP();
					$mail->isHTML(true);

					$mail->SMTPAuth=true;
					$mail->SMTPDebug=0;
					$mail->Host='smtp.gmail.com';
					$mail->Username='projectcollege123@gmail.com';
					$mail->Password='Qwerty!@';
					$mail->SMTPSecure='ssl';
					$mail->Port='465';
					$mail->From='projectcollege123@gmail.com';

					$mail->FromName='';
					$mail->addReplyTo($email,'');
					$mail->addCC($email,'');
					$mail->Subject='New order';
					$mail->Body='Customer id:'.$cust.'<br>Goods id:'.$goods.'<br>Rate:'.$rate.'<br>Party id:'.$id.'<br>Order date:'.$date;
					$mail->AltBody='Body';


						if($mail->send()==TRUE)
						{
							echo "Order Placed.";
						}
						else
						{
							echo "error";
						}
					
				}
				


}
echo '<a href="homepage.php">go back</a>';
?>