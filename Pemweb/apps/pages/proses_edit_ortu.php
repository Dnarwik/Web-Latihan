<?php
    include 'koneksi.php';

    $id_ortu = $_POST['ID'];
    $id_sis = $_POST['ID_siswa'];
    $nama_ortu = $_POST['nama_ortu'];
    $job_ortu = $_POST['pekerjaan_ortu'];
    $alamat_ortu = $_POST['alamat_ortu'];
    $nama_wali = $_POST['nama_wali'];
    $hub_wali = $_POST['hub_wali'];
    $job_wali = $_POST['pekerjaan_wali'];
    $alamat_wali = $_POST['alamat_wali'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE ortu 
            SET id_siswa = '".$id_sis."',
            nama_ortu = '".$nama_ortu."',
            pekerjaan_ortu = '".$job_ortu."',
            alamat_ortu = '".$alamat_ortu."',
            nama_wali = '".$nama_wali."',
            hub_wali = '".$hub_wali."',
            pekerjaan_wali = '".$job_wali."',
            alamat_wali = '".$alamat_wali."',
            no_hp = '".$no_hp."'
            WHERE id_ortu = '".$id_ortu."'  
            ";
    
    $ex = mysqli_query($connect, $query);
?>
<script type="text/javascript">
	window.location.href = 'kelola_siswa.php';
	alert("Data Berhasil Diubah");
</script>