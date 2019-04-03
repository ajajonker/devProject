<?php

session_start();

// connect to DB
$db = mysqli_connect("localhost", "root", "", "portfolio");

if (isset($_POST['register_btn'])) {
	session_start();
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$password2 = mysqli_real_escape_string($db,$_POST['password2']);

	if ($password == $password2) {
		//create user
		$password = md5($password); //hash password before storing; security purposes
		$sql = "INSERT INTO users(username, password) VALUES ('$username','$password')";
		mysqli_query($db, $sql);
		$_SESSION['message'] = "You are now logged in.";
		$_SESSION['username'] = $username;
		header("location: admin/index.php"); //redirect to admin/index-page
	} else {
		$_SESSION['message'] = "The two passwords do not match.";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form  method="post" action="register.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>
			<tr>
				<td>Password again:</td>
				<td><input type="password" name="password2" class="textInput"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="register_btn" value="Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>

