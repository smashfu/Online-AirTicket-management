<?php 
	session_start();

	require "dbh.inc.php";

	$schedule_id=$_POST['inp_schedule_id'];
	$ticket_type = $_POST['ticket_type'];
	$price = 500; // TODO Fetch price for this ticket

	$sql = 'INSERT INTO tickets(schedule_id,passport_no,price,type)
			VALUES ('.$schedule_id.','. $_SESSION['passport_no'] .','.$price .',"'.$ticket_type .'")';
	$result=mysqli_query($conn,$sql);
	if($result==1){
		header("Location: ../index.php?booking=success");
		exit();
	}else{
		header("Location: ../index.php?booking=failed");
		exit();
	}

	echo $sql;

?>
