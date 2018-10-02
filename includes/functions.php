<?php
session_start();
error_reporting(0);
/**
ADD CODE HERE
**/

if (isset($_POST['login_submit'])) {
	userlogin($conn);
} elseif (isset($_POST['register_submit'])) {
	usersignup($conn);
}


function userlogin($conn){
	if (isset($_POST['login_submit'])) {
		$email=mysqli_real_escape_string($conn, $_POST['Email']);
		$password=mysqli_real_escape_string($conn, $_POST['Password']);

		$sql = "SELECT * FROM blog_members WHERE blog_members.email='$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			//USER NOT FOUND ERROR
			header('Location: ../login.php?user_login=true&user_not_found=true');
		} else if ($resultCheck==1) {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
							//INCORRECT PASSWORD ERROR
					header('Location: ../login.php?user_login=true&login_error=true');
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['user_name'] = $row['first_name'].' '.$row['last_name'];
					
					header('Location: ../profile.php');
				}
			}
		}
	}
}



/**
ADD CODE HERE
**/

/**
ADD EMAIL VALIDATION FUNCTION HERE
**/

?>