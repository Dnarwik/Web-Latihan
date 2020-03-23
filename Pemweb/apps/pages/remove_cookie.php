<?php
	$user = $_COOKIE['user'];
	$pass = $_COOKIE['pass'];

	if ($user = 'siswa'){
	  setcookie("user", "");
	  setcookie("pass", "");
	  header("location: ../");
	} else if($user = 'admin'){
	  setcookie("user", "");
	  setcookie("pass", "");
	  header("location: ../");
	}
?>