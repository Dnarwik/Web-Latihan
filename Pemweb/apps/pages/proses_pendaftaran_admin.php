<?php
    include 'koneksi.php';

    $nip = $_POST['nip'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['namaLengkap'];

    $query = "INSERT INTO user_admin VALUES(
		'','".$nama_lengkap."','".$username."','".$password."'
    )";

    $ex = mysqli_query($connect, $query);
    header("Location: Login_admin.php");
?>
<script type="text/javascript">
	alert("Data berhasil disimpan, silahkan masuk halaman login untuk melanjutkan");
</script>