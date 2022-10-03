<?php
	include('conn.php');
	$reciept=$_GET['reciept'];
	mysqli_query($conn,"delete from user where reciept='$reciept'");
	header('location:index.php');
 
?>