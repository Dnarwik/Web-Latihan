<?php
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
    <title>Delete Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data <text id="ID"><?= $ID; ?></text> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="tidak">Tidak</button>
                    <button type="button" class="btn btn-primary" id="ya">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#modalHapus").modal();
        });

        $("#ya").click(function(){
            $.ajax({
                url: 'proses_delete.php',
                type: 'post',
                data: {
                    id : $("#ID").text()
                },
                success: function(data){
                    window.location.href = "kelola_siswa.php";
                    alert("Data berasil dihapus");
                },
                error: function(xhr){
                    alert("gagal");
                }
            })
        })

        $("#tidak").click(function(){
            window.location.href = "kelola_siswa.php";
        })
    </script>
</body>
</html>
<?php } ?>