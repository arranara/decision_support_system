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
      <div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Tambah Data Alternatif</div>
		  <div class="panel-body">
							<?php
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kriteria->fetch_assoc()) {
												@$k[$i] = $row["kriteria"];
												$i++;
											}
							?>
							<form role="form" method="post" action="tambah_alternatif.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="alternatif">Alternatif</label>
                                            <select class="form-control" name="alternatif" id="alternatif" placeholder="Plat Kendaraan" required>
                                            <?php
                                                
                                                $query = "SELECT * FROM kendaraan ORDER BY alternatif ASC";

                                                $result = mysqli_query($mysqli, $query);

                                                ?>
                                                <option  Disabled = true Selected = true value="" >Pilih</option>
                                                <?php while($data = mysqli_fetch_assoc($result) ){?>

                                                <option value="<?php echo $data['alternatif']; ?>"> <?php echo $data['alternatif']; ?> , <?php echo $data['merk']; ?></option>

                                            <?php } ?>
                                          </select>
                                        </div>
                                        
																				<div class="form-group">
                                            <label for="k1"><?php echo ucwords($k[0]);?></label>
                                            <select class="form-control" name="k1" id="k1" required>
                                              <option  Disabled = true Selected = true value="" >Pilih</option>
                                              <option value='1' <?php if($row["k1"]=='1') echo "selected"?>>Dibawah 5 Tahun</option>
                                              <option value='2' <?php if($row["k1"]=='2') echo "selected"?>>Diatas 10 Tahun</option>
                                              <option value='3' <?php if($row["k1"]=='3') echo "selected"?>>Diatas 15 Tahun</option>
                                              <option value='4' <?php if($row["k1"]=='4') echo "selected"?>>Diatas 20 Tahun</option>
										  	                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="k2"><?php echo ucwords($k[1]);?></label>
                                            <select class="form-control" name="k2" id="k2" required>
                                              <option  Disabled = true Selected = true value="" >Pilih</option>
                                              <option value='1' <?php if($row["k2"]=='1') echo "selected"?>>Suara Mesin Halus</option>
                                              <option value='2' <?php if($row["k2"]=='2') echo "selected"?>>Masalah Pada Engine Mounting</option>
                                              <option value='3' <?php if($row["k2"]=='3') echo "selected"?>>Kebocoran Oli</option>
                                              <option value='4' <?php if($row["k2"]=='4') echo "selected"?>>Kampas Kopling Tipis</option>
											                  </select>
                                        </div>

									  	                   <div class="form-group">
                                            <label for="k3"><?php echo ucwords($k[2]);?></label>
                                            <select class="form-control" name="k3" id="k3" required>
                                              <option  Disabled = true Selected = true value="" >Pilih</option>
                                              <option value='1' <?php if($row["k3"]=='1') echo "selected"?>>Kinerja Kemudi Stabil</option>
                                              <option value='2' <?php if($row["k3"]=='2') echo "selected"?>>Getaran Kuat Pada Kemudi</option>
                                              <option value='3' <?php if($row["k3"]=='3') echo "selected"?>>Understeel Rusak</option>
                                              <option value='4' <?php if($row["k3"]=='4') echo "selected"?>>Gerak Kemudi Terlalu Bebas</option>
											                  </select>
                                        </div>

										                    <div class="form-group">
                                            <label for="k4"><?php echo ucwords($k[3]);?></label>
                                            <select class="form-control" name="k4" id="k4" required>
                                              <option  Disabled = true Selected = true value="" >Pilih</option>
                                              <option value='1' <?php if($row["k4"]=='1') echo "selected"?>>Pengereman Stabil</option>
                                              <option value='2' <?php if($row["k4"]=='2') echo "selected"?>>Muncul Suara Berdecit</option>
                                              <option value='3' <?php if($row["k4"]=='3') echo "selected"?>>Rem Keras Saat Diinjak</option>
                                              <option value='4' <?php if($row["k4"]=='4') echo "selected"?>>Rem Menjadi Lebih Dalam</option>
                                        </select>
                                        </div>

										                    <div class="form-group">
                                            <label for="k5"><?php echo ucwords($k[4]);?></label>
                                            <select class="form-control" name="k5" id="k5" required>
                                              <option  Disabled = true Selected = true value="" >Pilih</option>
                                              <option value='1' <?php if($row["k5"]=='1') echo "selected"?>>Semua Lampu Menyala</option>
                                              <option value='2' <?php if($row["k5"]=='2') echo "selected"?>>Sebuah Lampu Tidak Menyala</option>
                                              <option value='3' <?php if($row["k5"]=='3') echo "selected"?>>Lampu Menyala Tidak Terang</option>
                                              <option value='4' <?php if($row["k5"]=='4') echo "selected"?>>Semua Lampu Tidak Menyala</option>
                                        </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="k6"><?php echo ucwords($k[5]);?></label>
                                            <select class="form-control" name="k6" id="k6" required>
                                              <option  Disabled = true Selected = true value="" >Pilih</option>
                                              <option value='1' <?php if($row["k6"]=='1') echo "selected"?>>Ban dan Velg Masih Bagus</option>
                                              <option value='2' <?php if($row["k6"]=='2') echo "selected"?>>Casing Break up</option>
                                              <option value='3' <?php if($row["k6"]=='3') echo "selected"?>>Sidewall Putus</option>
                                              <option value='4' <?php if($row["k6"]=='4') echo "selected"?>>Motif Tapak Terangkat</option>
                                        </select>    
                                        </div><!-- /.box-body -->

                                    <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="alternatif.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                                    </div>
                            </form>
							<?php ?>
		  </div>
		  <div class="panel-footer text-primary"><?php echo $_SESSION['by'];?><div class="pull-right"></div></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
