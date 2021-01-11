<form action="email.php" method="post">
<input type=submit name=email>
</form>
<?php
//465
require("phpmailer/PHPMailerAutoload.php");
if(isset($_POST['email']))
{
	$email='saurabhkedia88@gmail.com';
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
$mail->Subject='Password Recovery';
$mail->Body='Hello';
$mail->AltBody='Body';

		if($mail->send()==TRUE)
                {
					echo "Mail sent";
				}
				else
				{
					echo $mail->ErrorInfo;
				}
}		
?>