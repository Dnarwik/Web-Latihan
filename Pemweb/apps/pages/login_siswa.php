<?php
	error_reporting(E_ERROR | E_PARSE);
	$user = $_COOKIE['user'];
if(isset($user)) {
	header("location:home.php");
}else{
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card" style="margin-top:15px;">
                    <img class="card-img-top" src="../dist/img/1.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form action="proses_login_siswa.php" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelpId" placeholder="Masukkan Username">                     
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelpId" placeholder="Masukkan Password">                    
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-block" value="Login">
                            </div>       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
 }
?>