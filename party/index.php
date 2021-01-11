<?php 
include ('../header.php');
session_start();

include('../connection.php');

if(isset($_SESSION['user']))
{
	
	header('location:homepage.php');
}
else

{

			echo '
					<html>
					<head>
					<link rel="stylesheet" type="text/css" href="../style.css">
					</head>
					<style>
					    .container{
							width:50vw;
							padding: 8px;
							border-radius: 14px;
							background-color: rgba(80, 80, 80, 0.7);
							color:white;
							margin-top: 10%;
							transition: background-color 0.5s,
							box-shadow 0.5s;
							
						}

						.container:hover{
							width:56vw;
							padding: 8px;
							border-radius: 14px;
							background-color: rgba(80,0, 80, 0.7);
							box-shadow: 0px 0px 2px 10px rgba(80,0, 80, 0.2);
							color:white;
							margin-top: 10%;
						}

						input{
							border-radius: 50vw;
                            margin: 5px;
							border-color: rgba(0,0,0,0);
							transition: box-shadow 0.5s,
							background-color 0.4s;
						
						}
						input:focus{
							box-shadow: 0 0 0 2 rgba(255,255,255,0.5),
							            0 0 0 4 rgba(255,255,255,0.4),
										0 0 0 6 rgba(255,255,255,0.3),
										0 0 0 8 rgba(255,255,255,0.2);
						}
                        input:focus .container{
							width:56vw;
							padding: 8px;
							border-radius: 14px;
							background-color: rgba(80,0, 80, 0.7);
							box-shadow: 0px 0px 2px 10px rgba(80,0, 80, 0.2);
							color:white;
							margin-top: 10%;
						}
						
					a{
						float:right;
						padding-bottom:10px;
						transition:color 0.5s;
					}
					div:hover a{
						color: pink;
					}
					a:hover{
						color: red;
					}
					.btn-submit:hover{
						background-color: pink;
						content: "LogIn>>"
					}
					h1{
						float: center;
					}
					</style>
			
					<div class=container id=test>
					<form method="post" action="index.php">
			        <h1>LOG IN</h1>
					Username<input class=field type="text" name="user" required onfocus="mm()"><br>
					Password<input class=field type="password" name="password" required onfocus= "mm()"><br>
					<input class="btn-submit" type="submit" name="submit" value="login" onfocus= "mm()"><br>
					<a href="../index.php">Homepage ></a>
					</form>
					</div>
					</html>';
			

					if(isset($_POST['submit']))
					{
						$username=$_POST['user'];
						$password=$_POST['password'];
						
						$sql="select * from party where username='$username'";
						$run=mysqli_query($con,$sql);
						if($run)
						{
							while($row=$run->fetch_assoc())
							{	
								if($password==$row["password"])
								{
									$_SESSION['user']=$row["username"];
									$_SESSION['id']=$row['party_id'];
									header('location:homepage.php');
									
								}
								else
								{
									echo "Password wrong";
								}
							}
						}
						
					}

}


	echo '</br>';
	include ('../footer.php');

?>