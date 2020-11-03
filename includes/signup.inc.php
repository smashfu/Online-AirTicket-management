

<?php

	if(isset($_POST['signup-submit']) ){

		require "dbh.inc.php";

		$username=$_POST['username'];
		$passport_no=$_POST['passport_no'];
		$email=$_POST['email'];
		$password=$_POST['input_pwd'];
		$password_repeat=$_POST['input_pwd_repeat'];

		//checks for empty fields
		if(empty($username)||empty($passport_no)|| empty($email)||empty($password)||empty($password_repeat)){
			header("Location: ../signup.php?error=emptyfields&uid=".$username."&passport_no=".$passport_no."&email=".$email);
			exit();
		}
		//checks for invalid email and uid
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduidemail&uid=".$username."&passport_no=".$passport_no);
			exit();
		}
		//checks for invalid email
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidemail&uid=".$username."&passport_no=".$passport_no);
			exit();
		}
		//checks for invalid characters in uid
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduid&email=".$email."&passport_no=".$passport_no);
			exit();
		}
		//checks for non-matching passwords
		else if($password!==$password_repeat){
			header("Location: ../signup.php?error=nonmatchingpasswords&uid=".$username."&email=".$email."&passport_no=".$passport_no);
			exit();
		}
		else {

			$sql="SELECT username FROM users WHERE username=?";
			$stmt=mysqli_stmt_init($conn);
			//checking for sql error
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../signup.php?error=sqlerror");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$result_check = mysqli_stmt_num_rows($stmt);
				//checks for username already taken
				if($result_check>0){
					header("Location: ../signup.php?error=usernametaken&email=".$email);
				exit();
				}
				//signup data insertion
				else{

					$sql="INSERT INTO users(username,passport_no,user_type,email,password) VALUES(?,?,?,?,?)";
					$stmt=mysqli_stmt_init($conn);
					//checking for sql error
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../signup.php?error=sqlerror");
						exit();
					}
					else{
						$hased_pwd=password_hash($password,PASSWORD_DEFAULT);
						$user_type="customer";
						mysqli_stmt_bind_param($stmt,"sisss",$username,$passport_no,$user_type,$email,$password);
						mysqli_stmt_execute($stmt);
						header("Location: ../signup.php?signup=success");
						exit();
					}

				}
			}

		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else{
		header("Location: ../signup.php");
		exit();
	}

?>