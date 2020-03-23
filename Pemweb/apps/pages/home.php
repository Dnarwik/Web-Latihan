<?php
include 'koneksi.php';

$user=$_COOKIE['user'];
if(!isset($user)) {
	header("location:login_siswa.php");
} else {
    $query_siswa = mysqli_query($connect, "SELECT siswa.*, user_siswa.username, user_siswa.id_siswa
		FROM siswa INNER JOIN user_siswa
		ON siswa.id_siswa = user_siswa.id_siswa
		WHERE user_siswa.username = '".$user."'");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
</head>
<body> 
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">PPDB</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active"> 
                    <a class="nav-link" href="#">Daftar <span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item active">
					<a class="nav-link" href="biodata.php">Biodata <span class="sr-only"></span></a>
				</li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="remove_cookie.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <?php 
                foreach ($query_siswa as $key) {
                    ?>
                    <h1 class="display-3">Selamat Datang, <?= $key['nama_siswa']; ?></h1>
                    <?php
                }
            ?>
            <p class="lead">di Sistem PPDB SMK Brawijaya</p>
            <hr class="my-2">
        </div>
    </div>
    <script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>