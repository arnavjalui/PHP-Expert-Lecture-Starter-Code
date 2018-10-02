<?php

require_once('includes/functions.php');
if (!(isset($_SESSION['user_id']))) {
    header('Location: login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="style/normalize.css">
  <link rel="stylesheet" href="style/main.css">
</head>
<body>
<?php include('menu.php');?>
<?php 
	$name = $_SESSION['user_name']; 
	echo "<h2>Welcome, ".$name."</h2>";
?>

</body>
</html>
