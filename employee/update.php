<?php
session_start();
include('../connection.php');

if(isset($_SESSION['user']))
{
	echo '<link rel="stylesheet" type="text/css"href="ccc.css"><div class=conatiner>Update<form method=post action=update.php>
		Dispatch of product<br>
		<input type="radio" name="goods_dispatch" value="yes" checked>Yes<br>
		<input type="radio" name="goods_dispatch" value="no" checked>No<br>
		Delivery of product<br>
		<input type="radio" name="goods_delivery" value="yes" checked>Yes<br>
		<input type="radio" name="goods_delivery" value="no" checked>No<br>
		<input type=submit name=submit>
		</form></div>';
}
?>