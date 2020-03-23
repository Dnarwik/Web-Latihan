<?php
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user_siswa WHERE username = '".$username."' AND password = '".$password."'";
    $ex = $connect->query($query);

    if ($ex->num_rows == 1){
        $rows = $ex->fetch_assoc();
        setcookie("user", $rows['username']);
        header("location:home.php");    
    } else {
?>
	<script type="text/javascript">
		window.location.href = 'login_siswa.php';
		alert ("Login Gagal. Silahkan periksa username dan password Anda!");
	</script>
<?php } ?>