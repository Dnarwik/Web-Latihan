<?php
	$user=$_COOKIE['user'];
	$pass=$_COOKIE['pass'];
	if(!isset($user)) {
		header("location: Login_admin.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login dengan cookies</title>
</head>
<body>
    <h1>Hallo <?=$user?>, Selamat datang di web saya</h1>
	<td><a href="remove_cookie.php">Logout</a></td>
</body>
</html>