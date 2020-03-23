<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Akun Admin</title>
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
                    <a class="nav-link" href="#">Tambah Admin <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card bg-light" style="margin-top:30px;">
                    <form action="proses_pendaftaran_admin.php" method="post">
                        <div class="card-header">
                            Form Pendaftaran Akun Admin
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <input type="submit" value="Simpan" class="btn btn-success btn-sm btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
    <script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>