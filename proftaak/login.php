<?php

session_start();

// connect to DB
//include_once('connection.php');

$db = mysqli_connect("localhost", "root", "", "portfolio");

if (isset($_POST['login_btn'])) {
	//session_start();
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$password = mysqli_real_escape_string($db,$_POST['password']);

	$password = md5($password); // remember, we hashed the password before storing the last time
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($db,$sql);
	
if (mysqli_num_rows($result) == 1) {
		$_SESSION['message'] = "You are logged in.";
		$_SESSION['username'] = $username;
		header("location: admin/index.php");
		} else {
			$_SESSION['message'] = "Username/password incorrect.";
		}
}

?>


<!DOCTYPE html>
<html>
<!-- !$_SESSION = not true, laat inlogvelden zien zoals hieronder  -->
	<?php if (!$_SESSION){ ?>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="pages/style.css">
</head>
<body>
	<div class="titel"><h4>Login gebruiker:</h4></div>
	<div class="loginpagina">
		<form  method="post" action="login.php">
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
					<td></td>
					<td><input type="submit" name="login_btn" value="Login"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
<!-- $_SESSION = true, hieronder doorgestuurd naar admin/index.php -->
<?php } elseif($_SESSION) {
	header('location: admin/index.php');
}?>
</html>

