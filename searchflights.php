<?php 
	require "header.php";
	require "includes\dbh.inc.php";
 ?>

<main>

	<br><br><br><br>

		<div class="form" >

		<form action="searchflights.inc.php" method="GET">

		<h3>Search for flights</h3><br>

			<!-- select source -->
			<select class="form-control" name="source">
			    <?php
			    	$sql="SELECT DISTINCT location FROM airports;";
			    	$result=mysqli_query($conn,$sql);
			    	$resultCheck=mysqli_num_rows($result);

			    	if($resultCheck>0){
			    		echo '<option> Select Source </option>';
			    		while($row = mysqli_fetch_assoc($result)){
			    			echo '<option value="'.$row['location'].'">'.$row['location'].'</option>';
			    		}
			    	}
			    ?>
		    </select> <br>

		    <!-- select destination -->
		    <select class="form-control" name="destination">
			    <?php
			    	$sql="SELECT DISTINCT location FROM airports;";
			    	$result=mysqli_query($conn,$sql);
			    	$resultCheck=mysqli_num_rows($result);

			    	if($resultCheck>0){
			    		echo '<option> Select Destination </option>';
			    		while($row = mysqli_fetch_assoc($result)){
			    			echo '<option value="'.$row['location'].'">'.$row['location'].'</option>';
			    		}
			    	}
			    ?>
		    </select> <br>

		  <button type="submit" class="btn btn-primary nomargin fullblock" name="search-submit">Search</button>

		</form>

	</div>

	<br><br><br><br><br><br><br><br>

</main>


<?php
	require "footer.php";
?>