<?php
	include 'koneksi.php';

	$ID = $_POST['ID'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$kab = $_POST['kabupaten'];
	$kec = $_POST['kecamatan'];
	$prov = $_POST['provinsi'];
	$tempat_lahir = $_POST['tmpt_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$agama = $_POST['agama'];
	$no_hp = $_POST['hp'];

	$query = "UPDATE siswa
			SET nama_siswa = '".$nama."',
			alamat = '".$alamat."',
			kabupaten = '".$kab."',
			kecamatan = '".$kec."',
			provinsi = '".$prov."',
			jenis_kelamin = '".$jk."',
			tempat_lahir = '".$tempat_lahir."',
			tanggal_lahir = '".$tgl_lahir."',
			agama = '".$agama."',
			no_hp = '".$no_hp."'
			WHERE id_siswa = '".$ID."'
			";
	$ex = mysqli_query($connect, $query);
?>
<script type="text/javascript">
	window.location.href = 'kelola_siswa.php';
	alert("Data Berhasil Diubah");
</script>