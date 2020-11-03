<?php 
	require "header.php";
	require "includes\dbh.inc.php";
 ?>

<main>

	<br><br><br>

		  

		  <div id="table">

		  	<h3 >All Passengers</h3><br>

		  	<a href=""></a>

<?php

		// $sql = "SELECT tickets.passport_no AS 'passport_no', (SELECT username FROM users WHERE users.passport_no=tickets.passport_no) AS 'passenger_name', COUNT(*) AS 'tickets_bought' FROM tickets
		// 	GROUP BY tickets.passport_no
		// 	ORDER BY tickets.passport_no ASC;";

		$sql = "SELECT passport_no AS 'passport_no', username AS 'passenger_name', COUNT(*) AS 'tickets_bought' FROM users
				WHERE passport_no IS NOT NULL
			GROUP BY passport_no
			ORDER BY passport_no ASC;";

		$result=mysqli_query($conn,$sql);
		$resultCheck= mysqli_num_rows($result);
		if($resultCheck>0){

			echo '<form action="passengerdetails.admin.php" method="POST">
			      <table class="table table-striped table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Passport no.</th>
					      <th scope="col">Pasenger name</th>
					      <th scope="col">Tickets bought</th>
					      <th scope="col">Details</th>
					    </tr>
					  </thead>
					  <tbody>';

			while($row=mysqli_fetch_assoc($result)) {
				//print_r($row); echo "<br>"; // prints the $row  - for debugging purposes
				echo '<tr>
					      <td>'.$row['passport_no'].'</td>
					      <td>'.$row['passenger_name'].'</td>
					      <td>'.$row['tickets_bought'].'</td>
					      <td><button class="btn btn-outline-success fullwidth" name="inp_passport_no" value="'.$row['passport_no'].'" >Passenger Details</button></td>
					    </tr> </a>
					    ';
			}

			echo '  </tbody>
					</table>';
		}
?>

	</div>


	<br><br><br><br><br><br><br><br>

</main>


<?php
	require "footer.php";
?>