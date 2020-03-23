<?php
	include 'koneksi.php';
	
	$user=$_COOKIE['user'];
	if(!isset($user)) {
	header("location:home.php");
	} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Isi Biodata</title>
	<link rel="stylesheet" href="../dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card border-info" style="margin-top:15px;">
				  <img class="card-img-top" src="../dist/img/1.jpg" width="500px" height="400px" alt="">
				  <div class="card-body">
					<h4 class="card-title">Isi Biodata</h4>
					<nav class="nav nav-tabs nav-stacked">
							<a class="nav-link" id="keBiodata">Biodata</a>
							<a class="nav-link" id="keOrtu">Orang Tua / Wali</a>
							<a class="nav-link" id="keSekolah">Riwayat Sekolah</a>
						</nav>
						<div id="biodata">
							<div class="col-md-12">
								<?php
								$user = $_COOKIE['user'];

								$query = "SELECT siswa.*, user_siswa.username, user_siswa.id_siswa
										FROM siswa INNER JOIN user_siswa
										ON siswa.id_siswa = user_siswa.id_siswa
										WHERE user_siswa.username = '".$user."'";
								$ex = mysqli_query($connect, $query);
								foreach ($ex as $key) {
								?>
								<div class="card-body">
									<form action="proses_simpan_biodata.php" method="post" class="form-horizontal">
										<input type="text" name="ID" value="<?= $key['id_siswa']; ?>" style="display: none;">
										<div class="form-group form-row">
											<div class="col">
												<label for="nama">Nama</label>
												<input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelpId" placeholder="Masukkan Username" value="<?= $key['nama_siswa']; ?>">
											</div>
											<div class="col">
												<label for="alamat">Alamat</label>
												<input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="emailHelpId" placeholder="Alamat" value="<?= $key['alamat']; ?>">
											</div>
											<div class="col">
												<label for="jenis_kelamin">Jenis Kelamin</label>
												<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
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
												<input type="text" class="form-control" name="kabupaten" id="kabupaten" aria-describedby="emailHelpId" placeholder="Kabupaten / Kota" value="<?= $key['kabupaten']; ?>">
											</div>
											<div class="col">
												<label for="kecamatan">Kecamatan</label>
												<input type="text" class="form-control" name="kecamatan" id="kecamatan" aria-describedby="emailHelpId" placeholder="Kecamatan" value="<?= $key['kecamatan']; ?>">
											</div>
											<div class="col">
												<label for="provinsi">Provinsi</label>
												<input type="text" class="form-control" name="provinsi" id="provinsi" aria-describedby="emailHelpId" placeholder="Provinsi" value="<?= $key['provinsi']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="tmpt_lahir">Tempat Lahir</label>
												<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" aria-describedby="emailHelpId" placeholder="Tempat Lahir" value="<?= $key['tempat_lahir']; ?>">
											</div>
											<div class="col">
												<label for="tgl_lahir">Tanggal Lahir</label>
												<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="emailHelpId" placeholder="Tanggal Lahir" value="<?= $key['tanggal_lahir']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="agama">Agama</label>
												<select class="form-control" name="agama" id="agama">
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
												<input type="text" class="form-control" name="hp" id="hp" aria-describedby="emailHelpId" placeholder="Nomor Handphone" value="<?= $key['no_hp']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<a href="home.php" class="btn btn-block btn-md btn-danger">Kembali</a>
											</div>
											<div class="col">
												<input type="submit" class="btn btn-block btn-md btn-success" value="Simpan">
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
								$user = $_COOKIE['user'];

								$query = "SELECT ortu.*, user_siswa.username, user_siswa.id_siswa
										FROM ortu INNER JOIN user_siswa
										ON ortu.id_siswa = user_siswa.id_siswa
										WHERE user_siswa.username = '".$user."'";
								$ex = mysqli_query($connect, $query);
								foreach ($ex as $key) {
								?>
								<div class="card-body">
									<form action="proses_simpan_ortu.php" method="post" class="form-horizontal">
										<input type="text" name="ID" value="<?= $key['id_ortu']; ?>" style="display: none;">
										<input type="text" name="ID_siswa" value="<?= $key['id_siswa']; ?>" style="display: none;">
										<div class="form-group form-row">
											<div class="col">
												<label for="nama">Nama Orang Tua</label>
												<input type="text" class="form-control" name="nama_ortu" id="nama_ortu" aria-describedby="emailHelpId" placeholder="Masukkan Username" value="<?= $key['nama_ortu']; ?>">
											</div>
											<div class="col">
												<label for="alamat">Alamat</label>
												<input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" aria-describedby="emailHelpId" placeholder="Alamat" value="<?= $key['alamat_ortu']; ?>">
											</div>
											<div class="col">
												<label for="pekerjaan">Pekerjaan</label>
												<input type="text" class="form-control" name="pekerjaan_ortu" id="pekerjaan_ortu" aria-describedby="emailHelpId" placeholder="Pekerjaan Orang Tua" value="<?= $key['pekerjaan_ortu']; ?>">
											</div>
											<div class="col">
												<label for="no">No. HP</label>
												<input type="text" class="form-control" name="no_hp" id="no_hp" aria-describedby="emailHelpId" placeholder="No. HP" value="<?= $key['no_hp']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="nama">Nama Wali</label>
												<input type="text" class="form-control" name="nama_wali" id="nama_wali" aria-describedby="emailHelpId" placeholder="Nama wali" value="<?= $key['nama_wali']; ?>">
											</div>
											<div class="col">
												<label for="alamat">Alamat</label>
												<input type="text" class="form-control" name="alamat_wali" id="alamat_wali" aria-describedby="emailHelpId" placeholder="Alamat wali" value="<?= $key['alamat_wali']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="pekerjaan_wali">Pekerjaan Wali</label>
												<input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" aria-describedby="emailHelpId" placeholder="Pekerjaan wali" value="<?= $key['pekerjaan_wali']; ?>">
											</div>
											<div class="col">
												<label for="hub_wali">Hubungan Wali</label>
												<input type="text" class="form-control" name="hub_wali" id="hub_wali" aria-describedby="emailHelpId" placeholder="Hubungan wali" value="<?= $key['hub_wali']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<a href="home.php" class="btn btn-block btn-md btn-danger">Kembali</a>
											</div>
											<div class="col">
												<input type="submit" class="btn btn-block btn-md btn-success" value="Simpan">
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
								$user = $_COOKIE['user'];

								$query = "SELECT sekolah.*, user_siswa.username, user_siswa.id_siswa
										FROM sekolah INNER JOIN user_siswa
										ON sekolah.id_siswa = user_siswa.id_siswa
										WHERE user_siswa.username = '".$user."'";
								$ex = mysqli_query($connect, $query);
								foreach ($ex as $key) {
								?>
								<div class="card-body">
									<form action="proses_simpan_sekolah.php" method="post" class="form-horizontal">
										<input type="text" name="ID" value="<?= $key['id_sekolah']; ?>" style="display: none;">
										<input type="text" name="ID_siswa" value="<?= $key['id_siswa']; ?>" style="display: none;">
										<div class="form-group form-row">
											<div class="col">
												<label for="nama_sekolah">Nama Sekolah</label>
												<input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" aria-describedby="emailHelpId" placeholder="Nama Sekolah" value="<?= $key['nama_sekolah']; ?>">
											</div>
											<div class="col">
												<label for="thn_lulus">Tahun Lulus</label>
												<input type="text" class="form-control" name="thn_lulus" id="thn_lulus" aria-describedby="emailHelpId" placeholder="Tahun Lulus" value="<?= $key['thn_lulus']; ?>">
											</div>
											<div class="col">
												<label for="pekerjaan">NO. Ijazah</label>
												<input type="text" class="form-control" name="no_ijazah" id="no_ijazah" aria-describedby="emailHelpId" placeholder="NO. Ijazah" value="<?= $key['no_ijazah']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<label for="kabupaten">Kabupaten / Kota</label>
												<input type="text" class="form-control" name="kabupaten" id="kabupaten" aria-describedby="emailHelpId" placeholder="Kabupaten / Kota" value="<?= $key['kabupaten']; ?>">
											</div>
											<div class="col">
												<label for="kecamatan">Kecamatan</label>
												<input type="text" class="form-control" name="kecamatan" id="kecamatan" aria-describedby="emailHelpId" placeholder="Kecamatan" value="<?= $key['kecamatan']; ?>">
											</div>
											<div class="col">
												<label for="provinsi">Provinsi</label>
												<input type="text" class="form-control" name="provinsi" id="provinsi" aria-describedby="emailHelpId" placeholder="Provinsi" value="<?= $key['provinsi']; ?>">
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col">
												<a href="home.php" class="btn btn-block btn-md btn-danger">Kembali</a>
											</div>
											<div class="col">
												<input type="submit" class="btn btn-block btn-md btn-success" value="Simpan">
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