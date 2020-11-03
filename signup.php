<?php 
	require "header.php";
 ?>

<main>
	
	<br><br><br>

	<div class="form">
		<form action="includes/signup.inc.php" method="POST">
		  <h3>Sign up</h3><br>

		  <div class="form-group">
		    <input type="text" class="form-control"   placeholder="Username" name="username">
		  </div>

		  <div class="form-group">
		    <input type="text" class="form-control"   placeholder="Passport no" name="passport_no">
		  </div>

		  <div class="form-group">
		    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="E-mail" name="email">
		  </div>

		  <div class="form-group">
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Choose Password" name="input_pwd">
		  </div>

		  <div class="form-group">
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password" name="input_pwd_repeat">
		  </div><br>

		  <button type="submit" class="btn btn-primary nomargin fullblock" name="signup-submit">Sign up</button>

		</form>
	</div>

</main>


<?php
	require "footer.php";
?>