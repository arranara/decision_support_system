<?php 

    ob_start();

    session_start();

    $koneksi = new mysqli ("localhost","root","","spk-wp");

    
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <p>Penerapan Metode Weighted Product</p>
                <p>Sebagai Pendukung Keputusan Kelayakan Kendaraan Beroperasi Pada Jasa Sewa Kendaraan</p>
                <p>PT. Lima Jari Persada Palembang</p>
             
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Silahkan Login Terlebih Dahulu </strong> 
                        <img src="img./ljp.jpg" style="height: 5% ; width: 100%;">
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="Your Username " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                                        </div>

                                        <input type="submit" name="login" value="Login" class="btn btn-primary ">
                                
                                   
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>


<?php 

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $login = mysqli_query($koneksi,"select * from tb_admin where username='$username' and password='$password'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($login);

        if($cek > 0){
 
            $data = mysqli_fetch_assoc($login);
         
            // cek jika user login sebagai admin
            if($data['level']=="admin"){
         
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $data['id_admin'];
                $_SESSION['level'] = "admin";
                // alihkan ke halaman dashboard admin
                echo "<script>alert('Anda Telah Berhasil Login Sebagai Admin!');</script>";
                echo "<script>location='index.php';</script>";
         
            // cek jika user login sebagai mekanik
            }else if($data['level']=="mekanik"){
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $data['id_admin'];
                $_SESSION['level'] = "mekanik";
                // alihkan ke halaman dashboard mekanik
                echo "<script>alert('Anda Telah Berhasil Login Sebagai Mekanik!');</script>";
			echo "<script>location='mekanik/index.php';</script>";
         
             // cek jika user login sebagai pimpinan
            }else if($data['level']=="pimpinan"){
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $data['id_admin'];
                $_SESSION['level'] = "[pimpinan";
                // alihkan ke halaman dashboard pimpinan
                echo "<script>alert('Anda Telah Berhasil Login Sebagai Pimpinan!');</script>";
			echo "<script>location='pimpinan/index.php';</script>";
         
            }
        }else{
            echo "<script>alert('Username Atau Password Salah, Silahkan cek Username dan Password');</script>";
			echo "<script>location='login.php';</script>";
        }

    }
?>