<?php
include('/var/www/html/php-login/config/db.php'); # Database connection

# Error and success messages
global $successMsg, $emailExists, $_unameError, $_emailError, $pwError;
global $emailEmptyError, $unameEmptyError, $pwEmptyError;

$_email = $_username = $_password = ""; # Set empty form vars for validation mapping

if(isset($_POST["signup"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    # Checks if email already exists
    $email_check_query = mysqli_query($connection, "SELECT * FROM user WHERE email='{$email}'");
    $rowCount = mysqli_num_rows($email_check_query);
    if(!empty($email) && !empty($username) && !empty($password)){
	if($rowCount>0){ # Checks if user email already exists
	    $emailExists = '
	    <div class="alert alert-danger" role="alert">
	    User with email already exists!
	    </div>
	    ';
	} else{
	    $_email = mysqli_real_escape_string($connection,$email);
	    $_username = mysqli_real_escape_string($connection,$username);
	    $_password = mysqli_real_escape_string($connection,$password);

	    # Perform validation
	    if(!filter_var($_email, FILTER_VALIDATE_EMAIL)){
		$_emailError= '
		<div class="alert alert-danger">
		Email format is invalid.
			   </div>
		';
	    }
	    if(!preg_match("/^[a-zA-Z\d]+$/", $_username)){
		$_unameError =  '
		<div class="alert alert-danger">
		Only letters and numbers are allowed.
			   </div>
		';
	    }
	    if(!preg_match("/^[a-zA-Z\d]+$/", $_password)){
		$pwError = '
		<div class = "alert alert-danger">
		Only letters and numbers are allowed.
			     </div>
		';
	    }
	    if((filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[a-zA-Z\d]+$/", $_username)) && (preg_match("/^[a-zA-Z\d]+$/", $_password))){
		$password_hash=password_hash($password, PASSWORD_BCRYPT);
		# Preventing SQL injection?
		$stmt=$connection->prepare("INSERT INTO user (username,password,email) VALUES('{$username}','{$password_hash}','{$email}')");
		$stmt->bind_param("sss", $username, $password_hash, $email);
		$stmt->execute();
		$stmt->close();
		$successMsg = '
		<div class="alert alert-success">
		Successful signup!
		</div>
		';
	    }
	}
    } else{
	if(empty($email)){
	    $emailEmptyError = '
	    <div class="alert alert-danger">
	    Email cannot be blank.
		     </div>
	    ';
	}
	if(empty($username)){
	    $unameEmptyError = '
	    <div class="alert alert-danger">
	    Username cannot be blank.
		       </div>
	    ';
	}
	if(empty($password)){
	    $pwEmptyError = '
	    <div class="alert alert-danger">
	    Password cannot be blank.
		       </div>
	    ';
	}
    }
}
?>
