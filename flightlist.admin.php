<?php 
	require "header.php";
	require "includes\dbh.inc.php";
 ?>

<main>

	<br><br><br>

		  

		  <div id="table">

		  	<h3 >All Flights</h3><br>

		  	<a href=""></a>

<?php

		$sql = 'SELECT schedule_id,aeroplane_id, airlines.name AS "airlines_name", schedules.flight_no,
				(SELECT location
				FROM airports
					WHERE airport_id = source) AS "source", 
				(SELECT location
				FROM airports
					WHERE airport_id = destination) AS "destination"
				, dept_time, arr_time 
				FROM schedules 
					JOIN flights ON schedules.flight_no=flights.flight_no
					JOIN airlines ON flights.airline_id = airlines.airline_id;';

		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else{
			//mysqli_stmt_bind_param($stmt,"ss",$emailusername,$emailusername);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			$resultCheck= mysqli_num_rows($result);
			if($resultCheck>0){

				echo '<form action="flightdetails.admin.php" method="POST">
				      <table class="table table-striped table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">Airlines</th>
						      <th scope="col">Flight no.</th>
						      <th scope="col">Source</th>
						      <th scope="col">Destination</th>
						      <th scope="col">Departure Time</th>
						      <th scope="col">Arrival Time</th>
						      <th scope="col">Details</th>
						    </tr>
						  </thead>
						  <tbody>';

				while($row=mysqli_fetch_assoc($result)) {
					//print_r($row); echo "<br>"; // prints the $row  - for debugging purposes
					echo '<tr>
						      <th scope="row">'.$row['airlines_name'].'</th>
						      <td>'.$row['flight_no'].'</td>
						      <td>'.$row['source'].'</td>
						      <td>'.$row['destination'].'</td>
						      <td>'.$row['dept_time'].'</td>
						      <td>'.$row['arr_time'].'</td>
						      <td><button class="btn btn-outline-success fullwidth" name="inp_schedule_id" value="'.$row['schedule_id'].'">See Details</button></td>
						    </tr> </a>
						    ';
				}

				echo '  </tbody>
						</table>';
			}

		}
?>

	</div>


	<br><br><br><br><br><br><br><br>

</main>


<?php
	require "footer.php";
?>