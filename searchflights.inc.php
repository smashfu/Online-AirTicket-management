<?php 
	require "header.php";
 ?>

<main>

	<br><br><br>

<?php

	require "includes/dbh.inc.php";

	$inp_source=$_GET['source'];
	$inp_destination=$_GET['destination'];

			$sql = 'SELECT schedule_id,aeroplane_id, airlines.name, schedules.flight_no,
				(SELECT location
				FROM airports
					WHERE airport_id = source) AS "source", 
				(SELECT location
				FROM airports
					WHERE airport_id = destination) AS "destination"
				, dept_time, arr_time 
				FROM schedules 
					JOIN flights ON schedules.flight_no=flights.flight_no
					JOIN airlines ON flights.airline_id = airlines.airline_id
				HAVING Source LIKE ? AND Destination LIKE ?
				; ';

		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"ss",$inp_source, $inp_destination);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			$resultCheck= mysqli_num_rows($result);
			if($resultCheck>0){
					//TODO  : Add else clause : empty -> no flights
				//header("Location: ../allflights.php");

				echo '<html> <body> <div id="table">
				<form action="bookflight.php" method="POST">
				<table class="table table-striped table-bordered">
				<h3> '; 
				if($inp_source=='%' && $inp_destination=='%'){
					echo 'All Flights';
				}else{
					echo $inp_source;  echo ' - '; echo $inp_destination; 
				}
						
				echo '</h3><br>
						  <thead>
						    <tr>
						      <th scope="col">Airlines</th>
						      <th scope="col">Flight no.</th>
						      <th scope="col">Source</th>
						      <th scope="col">Destination</th>
						      <th scope="col">Departure Time</th>
						      <th scope="col">Arrival Time</th>
						      <th scope="col">Ticket</th>
						    </tr>
						  </thead>
						  <tbody>';

				while($row=mysqli_fetch_assoc($result)) {
					//print_r($row); echo "<br>"; // prints the $row  - for debugging purposes
					echo ' <tr>
						      <th scope="row">'.$row['name'].'</th>
						      <td>'.$row['flight_no'].'</td>
						      <td>'.$row['source'].'</td>
						      <td>'.$row['destination'].'</td>
						      <td>'.$row['dept_time'].'</td>
						      <td>'.$row['arr_time'].'</td>
						      <td><button class="btn btn-outline-success fullwidth" name="inp_schedule_id" value="'.$row['schedule_id'].'">Buy</button></td>
						    </tr>';
				}

				echo '  </tbody>
						</table> </form></div> </body> </html>';
			}

		}


?>

<?php
	require "footer.php";
?>