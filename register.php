<?php
require_once('includes/functions.php');
if ((isset($_SESSION['user_id']))) {
    header('Location: profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="stylesheet" href="style/normalize.css">
  <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu2.php');?>

	<h2>Register for the blog</h2>

	<form action='includes/functions.php' method='POST'>

        <p><label>Email</label><br />
        <input type='email' name='email' id="email" value='' required ></p>

		<p><label>First name</label><br />
		<input type='text' name='first_name' value='' required></p>

		<p><label>Last name</label><br />
		<input type='text' name='last_name' value='' required></p>

		<p><label>Password</label><br />
		<input type='password' name='password' value='' required></p>

		
		
		<p><input type='submit' name='register_submit' value='Register Now!'></p>

	</form>

</div>