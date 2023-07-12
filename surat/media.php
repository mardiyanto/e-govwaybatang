<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['nik'])  AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APLIKASI INPUT</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../sys/bootstrap/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
      <link rel="stylesheet" href="../sys/bootstrap/font/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="../sys/bootstrap/plugins/datatables/dataTables.bootstrap.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../sys/bootstrap/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../sys/bootstrap/dist/css/AdminLTE.min.css">
	
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../sys/bootstrap/dist/css/skins/_all-skins.min.css">
<script src="../ckeditor/ckeditor.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

  <header class="main-header">
  
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PORTAL</b> SURAT </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

    </nav>
  </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../sys/bootstrap/dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			
			
			<?php 	$a=mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk_detail WHERE nik='$_SESSION[nik]'"));  echo"
              <p>Selamat Datang</p>
              <a href='#'><i class='fa fa-circle text-success'></i> $a[nama_lengkap] </a> "; ?>
            </div>
          </div>
          <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
         /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU NAVIGATION</li>
            <li class="treeview">
              <a href="media.php?module=home">
                <i class="fa fa-dashboard"></i> <span>Beranda</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Input Data</span>
                <span class="label label-primary pull-right">1</span>
              </a>
              <ul class="treeview-menu">
			    <li><a href='surat_domisili.html'><i class="fa fa-circle-o"></i>Surat Domisili</a></li>
				 <li><a href='kelakuanbaik.html'><i class="fa fa-circle-o"></i>Surat Ket Kelakuan Baik</a></li>
				 <li><a href='surat_keterangan_kematian.html'><i class="fa fa-circle-o"></i>Surat Ket Kematian</a></li>
				 <li><a href='surat_kurang_mampu.html'><i class="fa fa-circle-o"></i>Surat Ket Kurang Mampu</a></li>
				 <li><a href='belumnikah.html'><i class="fa fa-circle-o"></i>Surat Ket Belum Menikah</a></li>
				 <li><a href='surat_usaha.html'><i class="fa fa-circle-o"></i>Surat Ket Usaha</a></li>
				 <li><a href='surat_kuasa.html'><i class="fa fa-circle-o"></i>Surat Kuasa</a></li>
				 <li><a href='surat_izin.html'><i class="fa fa-circle-o"></i>Surat Izin Keramaian</a></li>
      
			  </ul>
            </li>
    <li>
              <a href="media.php?module=statussurat">
                <i class="fa fa-cloud-download"></i> <span>CEK STATUS SURAT</span>
              </a>
            </li>
			
            <li>
              <a href="logout.php">
                <i class="fa fa-cloud-download"></i> <span>KELUAR</span>
              </a>
            </li>

		
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
           <section class="content-header">
      <h1>
        PORTAL APLIKASI SURAT ONLINE
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">APLIKASI</a></li>
        <li class="active">SURAT ONLINE</li>
      </ol>
    </section>

    <!-- Main content -->
 	<?php include "content.php"; ?>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="mardybest@gmail.com">Almsaeed Studio / mardybest</a>.</strong> All rights reserved.
      </footer>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
		    <script src="../sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- DataTables -->
    <script src="../sys/bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../sys/bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- page script -->
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
    <!-- Bootstrap 3.3.5 -->
    <script src="../sys/bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../sys/bootstrap/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../sys/bootstrap/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../sys/bootstrap/dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

    <!-- jQuery 2.1.4 -->
   
  </body>
</html>

<?php
}
}
?>