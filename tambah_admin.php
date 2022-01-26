<?php
	session_start();
	include('configdb.php');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo $_SESSION['judul']." - ".$_SESSION['by'];?></title>

    <!-- Bootstrap core CSS -->
    <!--link href="ui/css/bootstrap.css" rel="stylesheet"-->
	<link href="ui/css/cerulean.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="./index_files/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_SESSION['judul'];?></a>
          </div>

          
          <div style="color: white; padding: 15px 100px 5px 100px; float: right;
            font-size: 16px;"> &nbsp; <a href="logout.php" class="btn-primary square-btn-adjust">
            <i class="fa fa-sign-out"></i>Logout</a> 
          </div>
          
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="admin.php">Data Admin</a></li>
                <li><a href="kendaraan.php">Data Kendaraan</a></li>
                <li><a href="kriteria.php">Data Kriteria</a></li>
                <li><a href="alternatif.php">Data Alternatif</a></li>
                <li><a href="analisa.php">Analisa</a></li>
                <li><a href="perhitungan.php">Perhitungan</a></li>
			      </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
<div class="panel-heading">
        Tambah Data
</div>
<div class="box-tools pull-right">
            		<a href="admin.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                </div>
            </div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" required /> 
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username" required /> 
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" required /> 
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" required/> 
                                        </div>

                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level" required>
                                                <option value="admin">Admin</option>
                                                <option value="mekanik">Mekanik</option>
                                                <option value="pimpinan">Pimpinan</option>
                                            </select>
                                        </div>

                                        <div>
                                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                            <input type="reset" name="reset" value="reset" class="btn btn-default"> 
                                        </div>

                                    </div>
                                    </form>
                                </div>
</div>
</div>
</div>

<?php

 $id_admin = @$_POST['id_admin'];
 $nama = @$_POST['nama'];
 $username = @$_POST['username'];
 $password = @$_POST['password'];
 $email = @$_POST['email'];
 $level = @$_POST['level'];
 
 $simpan = @$_POST['simpan'];

 if ($simpan) {
  
    $result = $mysqli->query("INSERT INTO tb_admin SET id_admin='$id_admin', nama='$nama', username='$username', password='$password', email='$email', level='$level'");

  if ($result) {
   ?>

   <script type="text/javascript">
    
    alert("Data Admin Berhasil Disimpan :)");
    window.location.href='admin.php';
   </script>

   <?php
  }
 }

?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
