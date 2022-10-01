<?php
	include('conn.php');
 
	$date=$_POST['date'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
    $item=$_POST['item'];
    $claimstatus=$_POST['claimstatus'];
    $paidstatus=$_POST['paidstatus'];
    $yearsection=$_POST['yearsection'];
 
	mysqli_query($conn,"insert into user (date, firstname, lastname, item, claimstatus, paidstatus, yearsection) values ('$date', '$firstname', '$lastname', '$item', '$claimstatus', '$paidstatus', '$yearsection')");
	header('location:index.php');
 
?>