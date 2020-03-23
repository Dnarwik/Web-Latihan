<?php
	include 'koneksi.php';
	
	$user=$_COOKIE['user'];
	if(!isset($user)) {
	header("location:Login_admin.php");
	} else {
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Siswa</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/datatable.min.css">
    <link rel="stylesheet" href="../dist/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/dataTables.responsive.bootstrap4.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">PPDB | <?= $user; ?></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="">Kelola Siswa <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="remove_cookie.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container" style="margin-top: 50px;">
    	<div class="row">
    		<table class="table table-hover dataTable w-full" data-plugin="dataTable" id="tabelnya">
    			<thead>
    				<td>ID siswa</td>
    				<td>Nama Siswa</td>
    				<td>Jenis Kelamin</td>
    				<td>Tempat, Tanggal Lahir</td>
    				<td>Aksi</td>
    			</thead>
    			<tbody>
    				<?php 
    				$query = mysqli_query($connect, "SELECT * FROM siswa");
    				foreach ($query as $key) {
    					?>
    						<tr>
		    					<td><?= $key['id_siswa']; ?></td>
		    					<td><?= $key['nama_siswa']; ?></td>
		    					<td><?= $key['jenis_kelamin']; ?></td>
		    					<td><?= $key['tempat_lahir'].", ".$key['tanggal_lahir']; ?></td>
		    					<td>
		    						<a href="preview.php?data=<?= $key['id_siswa']; ?>" class="btn btn-info btn-sm">Preview</a>
		    						<a href="edit.php?data=<?= $key['id_siswa']; ?>" class="btn btn-success btn-sm">Edit</a>
		    						<a href="delete.php?data=<?= $key['id_siswa']; ?>" class="btn btn-danger btn-sm">Hapus</button>
		    					</td>
		    				</tr>
    					<?php
    				}
    				?>		
    			</tbody>
    		</table>
		</div>
	</div>
	<script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/bootstrap.bundle.min.js"></script>
	<script src="../dist/js/jquery.dataTables.js"></script>
	<script src="../dist/js/dataTables.bootstrap4.js"></script>
	<script src="../dist/js/dataTables.responsive.js"></script>
	<script src="../dist/js/responsive.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tabelnya").dataTable();
		});
	</script>
</body>
</html>
<?php } ?>