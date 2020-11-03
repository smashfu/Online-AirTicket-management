<?php 
	require "header.php";
	require "includes\dbh.inc.php";

	$schedule_id=$_POST['inp_schedule_id'];

	//show flight details + passenger list on that flight

	//TODO fetch these from SQL
	$price_classF = 500;
	$price_classB = 400;
	$price_classE = 250;

	$seats_empty_classF = 20;
	$seats_empty_classB = 30;
	$seats_empty_classE = 50;	

	$sql='SELECT schedule_id,aeroplane_id, airlines.name AS "airlines_name", schedules.flight_no,
			(SELECT location
			FROM airports
				WHERE airport_id = source) AS "source", 
			(SELECT name
			FROM airports
				WHERE airport_id = source) AS "source_airport_name",
			(SELECT location
			FROM airports
				WHERE airport_id = destination) AS "destination"
			, (SELECT name
			FROM airports
				WHERE airport_id = destination) AS "destination_airport_name",
			dept_time, arr_time 
			FROM schedules 
				JOIN flights ON schedules.flight_no=flights.flight_no
				JOIN airlines ON flights.airline_id = airlines.airline_id
			HAVING schedule_id='.$schedule_id.';';

	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);

		$row = mysqli_fetch_assoc($result);
		//print_r($row);
		echo '<br><br><br><br>';

		echo '<div class="jumbotron bigcard">';
			echo '<h1 class="display-4">';
				echo $row['flight_no'];
			echo '</h1>';
			echo '<p class="lead">';
				echo $row['airlines_name'];
			echo '</p>';
			echo '<p class="lead"> <b>From : </b>';
				echo $row['source']; 
				echo ' ( ';
					echo $row['source_airport_name'];
				echo ' )';
			echo '</p>';
			echo '<p class="lead"> <b>To : </b>';
				echo $row['destination']; 
				echo ' ( ';
					echo $row['destination_airport_name'];
				echo ' )';
			echo '</p>';
			echo '<p class="lead"> <b>Departure : </b>';
				echo $row['dept_time'];
			echo '</p>';
			echo '<p class="lead"> <b>Arrival : </b>';
				echo $row['arr_time'];
			echo '</p>';
			echo '<p class="lead"> 
					<b>Ticket price : </b>';
						echo "First class : ";  echo $price_classF;
						echo " $, Business class : ";  echo $price_classB;
						echo " $, Economy class : ";  echo $price_classE;
			echo ' $</p>';
			echo '<p class="lead"> 
					<b>Seats empty: </b>';
						echo "First class : ";  echo $seats_empty_classF;
						echo " , Business class : ";  echo $seats_empty_classB;
						echo " , Economy class : ";  echo $seats_empty_classE;
			echo '</p>';
			echo '<p class="lead"> 
					<b>Passenger list : </b>';
			echo '</p>';
		


		//show passenger list on the flight

		$sql = "SELECT tickets.passport_no AS 'passport_no', (SELECT username FROM users WHERE users.passport_no=tickets.passport_no) AS 'passenger_name', type AS 'ticket_type' FROM tickets WHERE tickets.schedule_id=".$schedule_id.";";

		$result=mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		if($resultCheck>0){

			echo '
			      <table class="table table-striped table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Passport no.</th>
					      <th scope="col">Passenger name</th>
					      <th scope="col">Ticket type</th>
					    </tr>
					  </thead>
					  <tbody>';

			while($row=mysqli_fetch_assoc($result)) {
				//print_r($row); echo "<br>"; // prints the $row  - for debugging purposes
				echo '<tr>';
					echo '<td>';
						echo $row['passport_no'];
					echo '</td>';
					echo '<td>';
						echo $row['passenger_name'];
					echo '<td>';
						echo $row['ticket_type']; //TODO class name extend classF -> First class
					echo '</td>';					  
			}


echo '</form>';
		echo '</div>';
			echo '  </tbody>
					</table>';
		}
		else{
			echo "<p class='label'>No passengers </p>";
		}

 ?>