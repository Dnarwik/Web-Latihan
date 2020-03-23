<?php
    include 'koneksi.php';

    $id_sek = $_POST['ID'];
    $id_sis = $_POST['ID_siswa'];
    $nama_sek = $_POST['nama_sekolah'];
    $tahun = $_POST['thn_lulus'];
    $no_ijaz = $_POST['no_ijazah'];
    $kab = $_POST['kabupaten'];
	$kec = $_POST['kecamatan'];
    $prov = $_POST['provinsi'];
    
    $query = "UPDATE sekolah 
            SET id_siswa = '".$id_sis."',
            nama_sekolah = '".$nama_sek."',
            kabupaten = '".$kab."',
            kecamatan = '".$kec."',
            provinsi = '".$prov."',
            thn_lulus = '".$tahun."',
            no_ijazah = ".$no_ijaz."
            WHERE id_sekolah = ".$id_sek."
            ";
    
    $ex = mysqli_query($connect, $query);
?>
<script type="text/javascript">
	window.location.href = 'kelola_siswa.php';
	alert("Data Berhasil Diubah");
</script>