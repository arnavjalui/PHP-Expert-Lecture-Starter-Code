<?php require('includes/functions.php'); 

$pID = $_GET['id'];
$sql1 = "SELECT user_id, postID, postTitle, postDate, postCont FROM blog_posts WHERE postID = '$pID'";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result);

if($row['postID'] == ''){
	header('Location: index.php');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">
		<?php
		if (!(isset($_SESSION['user_id']))) {
			include('menu2.php');
		} else {
			include('menu.php');
		}
		$post_uid = $row['user_id'];
		$sql2 = "SELECT first_name, last_name FROM blog_members WHERE blog_members.user_id='$post_uid'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($result2);
		$name = $row2['first_name'].' '.$row2['last_name'];
		
		echo '<div>';
		echo '<h1>'.$row['postTitle'].'</h1>';
		echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).' by <strong>'.$name.'</strong></p>';
		echo '<p>'.$row['postCont'].'</p>';				
		echo '</div>';
	?>

	</div>

</body>
</html>