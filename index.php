<?php require('includes/functions.php'); 

// if (!(isset($_SESSION['user_id']))) {
//     header('Location: login.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
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


		?>

		<?php
			try {

				$sql1 = "SELECT user_id, postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC";

				$result = mysqli_query($conn, $sql1);
				while($row = mysqli_fetch_array($result)){
					$post_uid = $row['user_id'];
					$sql2 = "SELECT first_name, last_name FROM blog_members WHERE blog_members.user_id='$post_uid'";
					$result2 = mysqli_query($conn, $sql2);
					$row2 = mysqli_fetch_array($result2);
					$name = $row2['first_name'].' '.$row2['last_name'];
					echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' by <strong>'.$name.'</strong></p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>


</body>
</html>