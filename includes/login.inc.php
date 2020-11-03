<?php

if(isset($_POST['login-submit'])){

	require "dbh.inc.php";

	$emailusername=$_POST["emailusername"];
	$password=$_POST["input_pwd"];

	if(empty($emailusername)||empty($password)){
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{
		$sql="SELECT * FROM users WHERE username=? OR email=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else{

			mysqli_stmt_bind_param($stmt,"ss",$emailusername,$emailusername);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if ($row=mysqli_fetch_assoc($result)) {

				//check if passwordword is correct
				//$pwd_check=passwordword_verify($password,$row['passwordword']);
				$password_check=($password===$row['password']);

				$copy=$row['passwordword'];

				if($password_check==false){
					header("Location: ../index.php?error=incorrectpassword");
					exit();
				}
				else if($password_check==true){
					session_start();
					$_SESSION['active_uid']=$row['uid'];
					$_SESSION['active_username']=$row['username'];
					$_SESSION['user_type']=$row['user_type'];
					$_SESSION['passport_no']=$row['passport_no'];

					header("Location: ../index.php?login=success");
					exit();
				}
				else{
					header("Location: ../index.php?error=loginerror");
					exit();
				}

			}

		}
	}

}
else{
	header("Location: ../index.php");
	exit();
}