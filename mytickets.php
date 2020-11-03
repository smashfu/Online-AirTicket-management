<?php 
	require "header.php";
	require "includes\dbh.inc.php";

	$passport_no=$_SESSION['passport_no'];

	//show flight details for each flight

	$sql='SELECT username AS "passenger_name", username , email FROM users WHERE passport_no='.$passport_no.';';

	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);

		$row = mysqli_fetch_assoc($result);
		//print_r($row);
		echo '<br><br><br><br>';

		echo '<div class="jumbotron bigcard">';
			echo '<h1 class="display-4">';
				echo $row['passenger_name']; //TODO fetch fullname from PNR
			echo '</h1>';
			echo '<p class="lead"> <b>Passport no. : </b>';
				echo $passport_no; 
			echo '</p>';
			echo '<p class="lead"> <b>Username : </b>';
				echo $row['username']; 

			echo '</p>';
			echo '<p class="lead"> <b>Email : </b>';
				echo $row['email'];
			echo '</p>';
			echo '<p class="lead"> 
					<b>Ticket list : </b>';
			echo '</p>';
		


		//show passenger list on the flight

		$sql = 'SELECT schedules.schedule_id,aeroplane_id, airlines.name, schedules.flight_no, passport_no,
				(SELECT location
				FROM airports
					WHERE airport_id = source) AS "source", 
				(SELECT location
				FROM airports
					WHERE airport_id = destination) AS "destination"
				, dept_time, arr_time, tickets.type
				FROM schedules 
					JOIN flights ON schedules.flight_no=flights.flight_no
					JOIN airlines ON flights.airline_id = airlines.airline_id
                    JOIN tickets ON tickets.schedule_id=schedules.schedule_id
                HAVING tickets.passport_no='.$passport_no.'
				; ';

		$result=mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		if($resultCheck>0){

			echo '<form action="flightdetails.passenger.php" method="POST">
			      <table class="table table-striped table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Airlines</th>
					      <th scope="col">Flight no.</th>
					      <th scope="col">Source</th>
					      <th scope="col">Destination</th>
					      <th scope="col">Departure Time</th>
					      <th scope="col">Arrival Time</th>
					      <th scope="col">Type</th>
					      <th scope="col">Type</th>
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
						      <td>'.$row['type'].'</td>
						      <td><button class="btn btn-outline-success fullwidth" name="inp_schedule_id" value="'.$row['schedule_id'].'">See Details</button></td>
						    </tr>';	  
			}


				echo '</form>';
				echo '</div>';
			echo '</tbody>
			</table>';
		}
		else{
			echo "<p class='label'>No tickets bought </p>";
		}


 ?>