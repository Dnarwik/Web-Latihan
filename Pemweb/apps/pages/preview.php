<?php
	include 'koneksi.php';
	extract($_GET);
	$ID = $_GET['data'];
	
	$user=$_COOKIE['user'];
	if(!isset($user)) {
	header("location:Login_admin.php");
	} else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Data</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <a class="nav-link" href="#">Daftar <span class="sr-only"></span></a>
                </li>
				<li class="nav-item active">
					<a class="nav-link" href="kelola_siswa.php">Kelola Siswa <span class="sr-only">(current)</span></a>
				</li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="remove_cookie.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card" style="margin-top:25px;">
					<div class="card-body">
						<h4 class="card-title">Edit Data</h4>
						<nav class="nav nav-tabs nav-stacked">
							<a class="nav-link" id="keBiodata">Biodata</a>
							<a class="nav-link" id="keOrtu">Orang Tua / Wali</a>
							<a class="nav-link" id="keSekolah">Riwayat Sekolah</a>
						</nav>
						<div id="biodata">
							<div class="col-md-12">
								<?php
								$query = "SELECT * FROM siswa
										WHERE siswa.id_siswa = '".$ID."'";
								$ex = mysqli_query($connect, $query);
								foreach ($ex as $key) {
								?>
								<div class="card-body">
									<form action="proses_edit_siswa.php" method="post" class="form-horizontal">
										<input type="text" name="ID" value="<?= $key['id_siswa']; ?>" style="display: none;">
										<div class="form-group form-row">
											<div class="col">
												<label for="nama">Nama</label>
												<input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelpId" placeholder="Masukkan Username" value="<?= $key['nama_siswa']; ?>" disabled>
											</div>
											<div class="col">
												<label for="alamat">Alamat</label>
												<input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="emailHelpId" placeholder="Alamat" value="<?= $key['alamat']; ?>" disabled>
											</div>
											<div class="col">
												<label for="jenis_kelamin">Jenis Kelamin</label>
												<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" disabled>
													<option value="">-- Pilih Jenis Kelamin --</option>
													<option value="L" <?php if($key['jenis_kelamin']=="L"){echo "selected";}else{} ; ?>>
														Laki - laki
													</option>
													<option value="P" <?php if($key['jenis_kelamin']=="P"){echo "selected";}else{} ; ?>>
														Perempuan
													</option>
												</select>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="kabupaten">Kabupaten / Kota</label>
												<input type="text" class="form-control" name="kabupaten" id="kabupaten" aria-describedby="emailHelpId" placeholder="Kabupaten / Kota" value="<?= $key['kabupaten']; ?>" disabled>
											</div>
											<div class="col">
												<label for="kecamatan">Kecamatan</label>
												<input type="text" class="form-control" name="kecamatan" id="kecamatan" aria-describedby="emailHelpId" placeholder="Kecamatan" value="<?= $key['kecamatan']; ?>" disabled>
											</div>
											<div class="col">
												<label for="provinsi">Provinsi</label>
												<input type="text" class="form-control" name="provinsi" id="provinsi" aria-describedby="emailHelpId" placeholder="Provinsi" value="<?= $key['provinsi']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="tmpt_lahir">Tempat Lahir</label>
												<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" aria-describedby="emailHelpId" placeholder="Tempat Lahir" value="<?= $key['tempat_lahir']; ?>" disabled>
											</div>
											<div class="col">
												<label for="tgl_lahir">Tanggal Lahir</label>
												<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="emailHelpId" placeholder="Tanggal Lahir" value="<?= $key['tanggal_lahir']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="agama">Agama</label>
												<select class="form-control" name="agama" id="agama" disabled>
													<option value="">-- Pilih Agama --</option>
													<option value="islam" <?php if($key['agama']=="islam"){echo "selected";}else{} ; ?>>Islam</option>
													<option value="kristen"<?php if($key['agama']=="kristen"){echo "selected";}else{} ; ?>>Kristen</option>
													<option value="buddha"<?php if($key['agama']=="buddha"){echo "selected";}else{} ; ?>>Buddha</option>
													<option value="hindu"<?php if($key['agama']=="hindu"){echo "selected";}else{} ; ?>>Hindu</option>
													<option value="katholik"<?php if($key['agama']=="katholik"){echo "selected";}else{} ; ?>>Katholik</option>
													<option value="konghuchu"<?php if($key['agama']=="konghuchu"){echo "selected";}else{} ; ?>>Konghuchu</option>
												</select>
											</div>
											<div class="col">
												<label for="hp">No. HP</label>
												<input type="text" class="form-control" name="hp" id="hp" aria-describedby="emailHelpId" placeholder="Nomor Handphone" value="<?= $key['no_hp']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<a href="kelola_siswa.php" class="btn btn-block btn-md btn-danger">Kembali</a>
											</div>
										</div>
									</form>
								</div>
								<?php } ?>
							</div>
						</div>
						<div id="ortu" style="display:none;">
							<div class="col-md-12">
								<?php
								$query = "SELECT * FROM ortu
										WHERE ortu.id_siswa = '".$ID."'";
								$ex = mysqli_query($connect, $query);
								foreach ($ex as $key) {
								?>
								<div class="card-body">
									<form action="proses_edit_ortu.php" method="post" class="form-horizontal">
										<input type="text" name="ID" value="<?= $key['id_ortu']; ?>" style="display: none;">
										<input type="text" name="ID_siswa" value="<?= $key['id_siswa']; ?>" style="display: none;">
										<div class="form-group form-row">
											<div class="col">
												<label for="nama">Nama Orang Tua</label>
												<input type="text" class="form-control" name="nama_ortu" id="nama_ortu" aria-describedby="emailHelpId" placeholder="Masukkan Username" value="<?= $key['nama_ortu']; ?>" disabled>
											</div>
											<div class="col">
												<label for="alamat">Alamat</label>
												<input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" aria-describedby="emailHelpId" placeholder="Alamat" value="<?= $key['alamat_ortu']; ?>" disabled>
											</div>
											<div class="col">
												<label for="pekerjaan">Pekerjaan</label>
												<input type="text" class="form-control" name="pekerjaan_ortu" id="pekerjaan_ortu" aria-describedby="emailHelpId" placeholder="Pekerjaan Orang Tua" value="<?= $key['pekerjaan_ortu']; ?>" disabled>
											</div>
											<div class="col">
												<label for="no">No. HP</label>
												<input type="text" class="form-control" name="no_hp" id="no_hp" aria-describedby="emailHelpId" placeholder="No. HP" value="<?= $key['no_hp']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="nama">Nama Wali</label>
												<input type="text" class="form-control" name="nama_wali" id="nama_wali" aria-describedby="emailHelpId" placeholder="Nama wali" value="<?= $key['nama_wali']; ?>" disabled>
											</div>
											<div class="col">
												<label for="alamat">Alamat</label>
												<input type="text" class="form-control" name="alamat_wali" id="alamat_wali" aria-describedby="emailHelpId" placeholder="Alamat wali" value="<?= $key['alamat_wali']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="pekerjaan_wali">Pekerjaan Wali</label>
												<input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" aria-describedby="emailHelpId" placeholder="Pekerjaan wali" value="<?= $key['pekerjaan_wali']; ?>" disabled>
											</div>
											<div class="col">
												<label for="hub_wali">Hubungan Wali</label>
												<input type="text" class="form-control" name="hub_wali" id="hub_wali" aria-describedby="emailHelpId" placeholder="Hubungan wali" value="<?= $key['hub_wali']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<a href="kelola_siswa.php" class="btn btn-block btn-md btn-danger">Kembali</a>
											</div>
										</div>
									</form>
								</div>
								<?php } ?>
							</div>
						</div>
						<div id="sekolah" style="display:none;">
							<div class="col-md-12">
								<?php
								$query = "SELECT * FROM sekolah
										WHERE sekolah.id_siswa = '".$ID."'";
								$ex = mysqli_query($connect, $query);
								foreach ($ex as $key) {
								?>
								<div class="card-body">
									<form action="proses_edit_sekolah.php" method="post" class="form-horizontal">
										<input type="text" name="ID" value="<?= $key['id_sekolah']; ?>" style="display: none;">
										<input type="text" name="ID_siswa" value="<?= $key['id_siswa']; ?>" style="display: none;">
										<div class="form-group form-row">
											<div class="col">
												<label for="nama_sekolah">Nama Sekolah</label>
												<input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" aria-describedby="emailHelpId" placeholder="Nama Sekolah" value="<?= $key['nama_sekolah']; ?>" disabled>
											</div>
											<div class="col">
												<label for="thn_lulus">Tahun Lulus</label>
												<input type="text" class="form-control" name="thn_lulus" id="thn_lulus" aria-describedby="emailHelpId" placeholder="Tahun Lulus" value="<?= $key['thn_lulus']; ?>" disabled>
											</div>
											<div class="col">
												<label for="pekerjaan">NO. Ijazah</label>
												<input type="text" class="form-control" name="no_ijazah" id="no_ijazah" aria-describedby="emailHelpId" placeholder="NO. Ijazah" value="<?= $key['no_ijazah']; ?>"  disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="kabupaten">Kabupaten / Kota</label>
												<input type="text" class="form-control" name="kabupaten" id="kabupaten" aria-describedby="emailHelpId" placeholder="Kabupaten / Kota" value="<?= $key['kabupaten']; ?>" disabled>
											</div>
											<div class="col">
												<label for="kecamatan">Kecamatan</label>
												<input type="text" class="form-control" name="kecamatan" id="kecamatan" aria-describedby="emailHelpId" placeholder="Kecamatan" value="<?= $key['kecamatan']; ?>" disabled>
											</div>
											<div class="col">
												<label for="provinsi">Provinsi</label>
												<input type="text" class="form-control" name="provinsi" id="provinsi" aria-describedby="emailHelpId" placeholder="Provinsi" value="<?= $key['provinsi']; ?>" disabled>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<a href="kelola_siswa.php" class="btn btn-block btn-md btn-danger">Kembali</a>
											</div>
										</div>
									</form>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$("#keOrtu").click(function(){
			$("#biodata").hide('slow', function(){
				$("#sekolah").hide('slow', function(){
					$("#ortu").show('slow');
				})
			})
		});
		$("#keSekolah").click(function(){
			$("#ortu").hide('slow', function(){
				$("#biodata").hide('slow', function(){
					$("#sekolah").show('slow');
				})
			})
		})
		$("#keBiodata").click(function(){
			$("#sekolah").hide('slow', function(){
				$("#ortu").hide('slow', function(){
					$("#biodata").show('slow');
				})
			})
		})
	</script>
</body>
</html>
<?php } ?>