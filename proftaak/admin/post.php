<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php


require '../connection.php';

	if(isset($_SESSION['postid'])){
		 $postid = $_SESSION["postid"];

		 $sql = "SELECT id, name, filename FROM Posts WHERE id=$postid";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $post = $stmt->fetch();

	}


	echo $post['id'];
	echo $post['name'];
	echo $post['filename'];


 echo ('<div><img class="img" src="'. $post["filename"] . '"></div>');


?>


<a href="posts.php">back</a>
</body>
</html>




