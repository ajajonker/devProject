<?php 

require 'connection.php';


if(isset($_POST['pagina'])){



$_SESSION['pageid'] = $_POST['pageid'];

header('location: admin/posts.php');
}

 ?>

<!DOCTYPE html>
<html>
<div class="mainsite">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

<header class="masthead">
	<title>Portfolio - Lex Jonker</title>
	<link rel="stylesheet" type="text/css" href="pages/style.css">
</header><!-- .masthead -->

<!--
SELECT id, name FROM Pages

Foreach $pages as $page

laat je die blokjes zien met form waarden hidden met id

Dat id gebruik je om dan alle posts op te halen waar het page_id gelijk aan id

$pageid = $_POST['pageid']

SELECT name, filename FROM Posts WHERE page_id=$pageid

Foreach $posts as $post

laat je in blokjes al jouwn posts zien

hier in de a href laat je de file zien
				// try{
				// 	if(isset($_POST['pagina'])){
			 //   		 	$pageid = $_POST["pageid"];
				// 	 	$sql = "SELECT name, filename FROM Posts WHERE page_id=$pageid";
				// 	 	$conn->exec($sql);
				// 	}
				// }

				// 	catch (PDOException $e) {
			 //        	echo $sql . "<br>" . $e->getMessage();
				// 	}
-->

		<div class="pagina">
<!-- <div class="container">
<ul>
	<li>TEST
		<ul id="testjes">
			<li>getest</li>
		</ul>
	</li>
</ul>
</div> -->

	    	<div  class="overzicht">
	    		<div class="container">
	    		<ul>
	    			<li><img class="img" src="admin/uploads/images/search.png">
		    			<ul id="list">
						<?php
		                $sql = "SELECT id, name FROM pages";
		                $stmt = $conn->prepare($sql);
		                $stmt->execute();
		                $pages = $stmt->fetchAll();
						?>
					
					
							<?php foreach ($pages as $page): ?>
								<li>
							<!-- <p><?php echo $page['name']; ?></p> -->
								<form method="post" action="index.php">
									<input type="hidden" name="pageid" value="<?php echo $page['id']; ?>" />
									<button class="buttonPost" name="pagina"><?php echo $page['name']; ?></button>
								</form>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				</ul>
			</div>
    		</div>
        </div>
	<div class="pagina-welkom1">
		<div class="login-knop">
			<a href="login.php"><img class="img" src="admin/uploads/images/login.png"></a>
		</div>
	</div>
	
	<div class="footer"><h4>lex jonker 2019</h4></a></div>

</div><!-- .site -->
</html>