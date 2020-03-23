<?php
    include 'koneksi.php';

    $nisn = $_POST['nisn'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['namaLengkap'];

    $query1 = mysqli_query($connect, "SELECT COUNT(id_siswa) AS total FROM siswa");
    foreach($query1 as $key){
        echo $id_siswa = "S". ++$key['total'];
    }

    $query = "INSERT INTO siswa VALUES(
        '".$id_siswa."','".$nama_lengkap."','','','','','','','','',''
    )";

    $query2 = "INSERT INTO user_siswa VALUES(
        DEFAULT,'".$id_siswa."','".$username."','".$password."'
    )";

    $query3 = "INSERT INTO sekolah VALUES(
        '','".$id_siswa."','','','','','',''
    )";

    $query4 = "INSERT INTO ortu VALUES(
        '','".$id_siswa."','','','','','','','',''
    )";

    $ex = mysqli_query($connect, $query);
    $ex2 = mysqli_query($connect, $query2);
    $ex3 = mysqli_query($connect, $query3);
    $ex4 = mysqli_query($connect, $query4);

    header("Location: login_siswa.php");   
?>
    <script type="text/javascript">
        alert("Data berhasil disimpan, silahkan masuk halaman login untuk melanjutkan");
    </script>