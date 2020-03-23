<?php
	$username = $_POST['username'];
	$pass = $_POST['password'];
	if ($username == "" ){
		echo"<script>alert('Username tidak boleh kosong');document.location='javascript:history.back(0);'</script>";}
	else if($pass==""){
		echo"<script>alert('Password tidak boleh kosong');document.location='javascript:history.back(0);'</script>";}
	else{
		setcookie("user", $username);
		setcookie("pass", $pass);
		header("location:homeAdmin.php");
	}
?>