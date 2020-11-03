<?php 
	require "header.php";
 ?>

<main>

	<br><br><br>

	<div class="form" >

		<form action="includes/login.inc.php" method="POST">

		  <h3>Log in</h3><br>

		  <div class="form-group">
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username / Email" name="emailusername">
		  </div>

		  <div class="form-group">
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="input_pwd">
		  </div><br>

		  <button type="submit" class="btn btn-primary nomargin fullblock" name="login-submit">Log in</button>

		</form>

	</div>

	<br><br><br><br><br><br><br><br>

</main>


<?php
	require "footer.php";
?>