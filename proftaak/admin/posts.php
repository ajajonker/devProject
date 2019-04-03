<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php


require '../connection.php';

	if(isset($_SESSION['pageid'])){
		 $pageid = $_SESSION['pageid'];

		 $sql = "SELECT id, name, filename FROM Posts WHERE page_id=$pageid";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $posts = $stmt->fetchAll();

	}

	// set session and header to page with the session set

	if(isset($_POST['post'])){

	$_SESSION['postid'] = $_POST['postid'];

	header('location: post.php');

	}


?>


<?php foreach ($posts as $post): ?>
	<p><?php echo $post['name']; ?></p>	
		<form method="post" action="posts.php">
				<input type="hidden" name="postid" value="<?php echo $post['id']; ?>" />
			<button name="post">Ga naar!</button>
		</form>

<?php endforeach; ?>

<a href="../index.php">back</a>

</body>
</html>


