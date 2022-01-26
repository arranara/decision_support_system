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

    <!-- Custom styles for this template -->
    <link href="ui/css/jumbotron.css" rel="stylesheet">

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
      <div class="panel panel-primary">
		  <!-- Default panel contents -->
      <div class="panel-heading">Edit Data Kendaraan</div>
           
           <?php
                @$alternatif = $_GET['alternatif'];

                $id = $_GET['id'];

                $result = $mysqli->query("SELECT * FROM kendaraan WHERE alternatif='$id'");

                $data = $result->fetch_assoc();
            ?>

		  <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                    <div class="form-group">
                                            <label>Nomor Polisi</label>
                                            <input class="form-control" name="alternatif"  value="<?php echo $data['alternatif']?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Merk</label>
                                            <input class="form-control" name="merk" type="text" value="<?php echo $data['merk']; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input class="form-control" name="tahun" type="text" value="<?php echo $data['tahun']; ?>" /> 
                                        </div>

                                        <div class="form-group">
                                        <label>Jenis</label>
                                            <select class="form-control" name="jenis" type="text" value="<?php echo $data['jenis']; ?>" /> 
                                                <option value="engkel">Engkel</option>
                                                <option value="tronton">Tronton</option>
                                            </select>
                                        </div>

                                        
                                        <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="kendaraan.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <input type="submit" name="simpan" value="ubah" class="btn btn-primary">
                                        </div>

                                    </div>
                                    </form>
                                </div>
</div>
</div>
</div>

<?php
include('configdb.php');
 $alternatif = @$_POST['alternatif'];
 $merk = @$_POST['merk'];
 $tahun = @$_POST['tahun'];
 $jenis = @$_POST['jenis'];

 $simpan = @$_POST['simpan'];

 if ($simpan) {
  
    $result = $mysqli->query("UPDATE kendaraan SET alternatif='$alternatif', merk='$merk', tahun='$tahun', jenis='$jenis' where alternatif='$alternatif'");

  if ($result) {
   ?>

   <script type="text/javascript">
    
    alert("Data Kendaraan Berhasil Diubah :)");
    window.location.href='kendaraan.php';
   </script>

   <?php
  }
 
}         
?>