<?php
    include 'koneksi.php';
    $ID = $_POST['id'];
    $query1 = "DELETE FROM ortu WHERE id_siswa='".$ID."'";
    $query2 = "DELETE FROM sekolah WHERE id_siswa='".$ID."'";
    $query3 = "DELETE FROM siswa WHERE id_siswa='".$ID."'";
    $query4 = "DELETE FROM user_siswa WHERE id_siswa='".$ID."'";
    $ex1 = mysqli_query($connect, $query1);
    $ex2 = mysqli_query($connect, $query2);
    $ex3 = mysqli_query($connect, $query3);
    $ex4 = mysqli_query($connect, $query4);
?>