<?php
	include('conn.php');
 
	$reciept=$_GET['reciept'];
 
	$date=$_POST['date'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
    $item=$_POST['item'];
    $claimstatus=$_POST['claimstatus'];
    $paidstatus=$_POST['paidstatus'];
    $yearsection=$_POST['yearsection'];
 
	mysqli_query($conn,"update user set date='$date', firstname='$firstname', lastname='$lastname', item='$item', claimstatus='$claimstatus', paidstatus='$paidstatus', paidstatus='$paidstatus', yearsection='$yearsection' where reciept='$reciept'");
	header('location:index.php');
 
?>