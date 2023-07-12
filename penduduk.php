<!DOCTYPE html>
<?php 
$tanggal=date("dmY");
session_cache_limiter(FALSE); 
session_start();
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/library.php";
include "config/class_paging.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>magExpress</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="dataTables/dataTables.bootstrap.css">
    <script src="dataTables/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="dataTables/jquery.dataTables.min.js"></script>
    <script src="dataTables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <!-- <li><a href="index.php">Beranda</a></li>
              <li><a href="xxx.php?module=galeri">Galery</a></li>
              <li><a href="http://localhost/desagedongtataan/surat">Login</a></li> -->
            </ul>
          </div>
          <div class="header_top_right">
          
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a href="#"><img src="images/logo.png" alt=""></a></div>

        </div>
      </div>
    </div>
  </header>
<div id="navarea">
<? include"menu.php"?>
  </div>
    <section id="mainContent">
<?php include "intpenduduk.php"; ?>
  </section>
</div>
<footer id="footer">
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2020 <a href="index.html">magExpress</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed BY Wpfreeware</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>