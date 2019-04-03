
<?php

require 'pages/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inspiratieweek V2.0</title>
	<link rel="stylesheet" type="text/css" href="pages/style.css">
</head>
<body>
<?php
	
    $sql = "SELECT COUNT(id) AS total FROM quotes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetch();

    // var_dump($count['total']);

    // echo $count;
    //var $quoteId = random_int(0, $count['total']);

    //echo (random_int(0, 6));

    $quoteId =  rand(1, $count['total']);

    $sql = "SELECT * FROM quotes INNER JOIN images ON quotes.image_id = images.id WHERE quotes.id = $quoteId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $quote = $stmt->fetch();

    echo ('<img class="img" src="admin/'. $quote["filename"] . '">');
    echo $quote['filename'];
    echo $quote['quote'];

    // $sql = "SELECT filename FROM images WHERE id = $quote['image_id']";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $image = $stmt->fetch();

    //echo $image['filename'];
?>

	<div>
		<img src="admin/uploads/images/PDF.png">
	</div>

	<div class="login-knop">
		<a href="pages/login.php">LOGIN</a>
	</div>
 
</body>
</html>