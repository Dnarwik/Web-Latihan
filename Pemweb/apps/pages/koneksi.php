<?php
    $host = 'localhost';
    $password = '';
    $user = 'root';
    $db = 'pemweb';

    $connect = new mysqli($host,$user,$password,$db);
	if ($connect->connect_errno) {
		echo $connect->connect_error;
	}
?>