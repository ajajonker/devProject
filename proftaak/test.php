<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";


/*try{
	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO teksten (titel, tekst, tijdweergave)
	VALUES ('Titel 1', 'Tekst van nummer 1', 'now()')";
	// use exec() because no results are returned
	$conn->exec($sql);
	echo "New record created successfully";
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

$conn = null;*/

/*try{
	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE teksten SET tijdweergave=CURRENT_TIME() WHERE id=9";

	// Prepare statement
	$stmt = $conn->prepare($sql);

	// Execute the query
	$stmt->execute();

	// echo a message to say the UPDATE succeeded
	echo $stmt->rowCount() . " records UPDATED successfully";
	}
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}

$conn = null;*/

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (isset($_POST['upload'])) {
		$target = ""
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Testpagina</title>
</head>
<body>
	<div id="content">
		<form method="post" action="admin/index.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="100000000">
			<div>
				<input type="file" name="file">
			</div>
			<div>
				<input type="submit" name="upload" value="Upload file">
			</div>
		</form>
	</div>
</body>
</html>