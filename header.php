<?php
	session_start();
?>

<!DOCTYPE html>

<html>

<head>

	<!--TODO : TITLE GENERATOR & LOGO/MIPMAP GENERATOR  --->
	<title>Flight DBMS</title>

	<style type="text/css">

		#body{
			padding:0%;
		}

		body {
		 background-image: url("includes/airplanebg.jpg");
		 background: #c2e59c; 
		 background-color: #cccccc;
		 background-position: center; 
		 background-repeat: no-repeat; 
		 background-size: auto auto;
		}

		.form{
			width:20%;
			margin:0 auto;
		}

		h3{
			margin-bottom: 3%;
		}

		.btn{
			margin:5px;
		}

		.nomargin{
			margin:0;
		}

		.fullblock{
			width:100%;
		}

		#table{
			width:75%;
			align:center;
			margin:0 auto;
		}

		.bigcard{
			width:70%;
			margin:0 auto;
		}

		.right{
			margin:0 auto;
			float:right;
		}

		.fullwidth{
			margin:0 auto;
			width:100%;
		}

		.compact{
			width:20%;
		}

		.btn, .nav-item{
    		transition: all 100ms ease-in;
    		transform: scale(1);   
    	}

		.btn:hover, .nav-item:hover {
			z-index: 2; 
			transition: all 60ms ease-in;
    		transform: scale(1.04);
   			
    	}


	</style>

	<!--import bootstrap online-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Offline bootstrap
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css" crossorigin="anonymous">
	<script src="bootstrap/js/bootstrap.bundle.js" crossorigin="anonymous"></script>	
	<script src="bootstrap/js/bootstrap.bundle.js" crossorigin="anonymous"></script>	
 -->

</head>


<body id='body'>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php">Flight DBMS</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">

			
		<?php

		//customer - book flights button
		if(isset($_SESSION['active_uid']) && $_SESSION['user_type']=='customer' ){
			echo '
				<li class="nav-item">
	        		<a class="nav-link" href="searchflights.inc.php?source=%&destination=%">All flights</a>
	        	</li>
	        	<li class="nav-item">
	        		<a class="nav-link" href="searchflights.php">Search flight</a>
	      		</li>

	      		<li class="nav-item">
	        		<a class="nav-link" href="mytickets.php">My Tickets</a>
	      		</li>
	   	 	</ul>';
	   	 };

	   	 //admin - add flights
	   	if(isset($_SESSION['active_uid']) && $_SESSION['user_type']=='admin' ){
			echo '
				<li class="nav-item">
	        		<a class="nav-link" href="flightlist.admin.php">Flight list</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="passengerlist.admin.php">Passenger list</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="#">Add airplanes</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="#">Add schedules</a>
	      		</li>
	   	 	</ul>';
	   	 };

	   	 //logout button
		if(isset($_SESSION['active_uid'])){
			echo '
			<form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="POST">
		    	  <button type="button" class="btn btn-secondary"> ';
	  			echo $_SESSION['active_username']." (".$_SESSION['user_type'].")";
			echo '</button>
	      		  <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="logout-submit">Log out</button> </form>' ;
	      }
	      else{
	      	  echo '</ul> <a href="login.php"> <button type="button" class="btn btn-primary">Log in</button> </a> ';
	      	  echo ' <a href="signup.php"> <button type="button" class="btn btn-primary">Sign up</button> </a> ';
	      }

	     ?>
    
	  </div>
	</nav>
