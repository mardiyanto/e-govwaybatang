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
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>

<title>menu admin</title>
<link rel="stylesheet" href="tema/lib/css/reset.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="tema/lib/css/defaults.css" type="text/css" media="screen, projection" />
<!--[if lt IE 8]><link rel="stylesheet" href="tema/lib/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
<link rel="stylesheet" href="tema/style.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="tema/sys/bootstrap/font/css/font-awesome.min.css">

<link rel="stylesheet" href="tema/slider.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="tema/sys/bootstrap/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="tema/menu/superfish.js"></script>
<script type="text/javascript" src="tema/menu/custom.js"></script>
<script type='text/javascript' src='tema/lib/js/jquery.mobilemenu.js'></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="tema/sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="tema/sys/bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="tema/sys/bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>
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
	<link rel="stylesheet" href="tema/sys/bootstrap/plugins/datatables/dataTables.bootstrap.css">
</head>
<body class="home blog page-builder">

<div id="container">
    <div class="clearfix">
        			<div class="menu-primary-container">
					<ul id="menu-atas" class="menus menu-primary">
                 <li class='limk'><a href=?module=home>Home</a></li>
					 <li><a href=logout.php>Logout</a></li>
				<li><a href="tema/media.php?module=home">Lihat website</a></li>
</ul></div>           <!--.primary menu--> 	
                


    </div>
    <div id="header">
    
        <div class="logo">
         
   
         
        </div><!-- .logo -->

        <div class="header-right">
 
</div><!-- .header-right -->
        </div><!-- #header -->
    
	    <div class="clearfix">
            			<div class="menu-secondary-container">
						<ul id="menu-bawah" class="menus menu-secondary">
     <li class='limk'><a href=?module=home>Home</a></li>
					 <li><a href=logout.php>Logout</a></li>
				<li><a href="../media.php?module=home">Lihat website</a></li>
	                
		</ul>
		</div>
                      <!--.primary menu--> 	
                    

    </div>		
			
			
       <div id="main">
        <div id="content">
<div class='post clearfix' id='post'>		
		<?php include "content.php";?><!--/post-->
				
 </div>    </div><!-- #content -->
		 <?php include "kanan.php";?>
</div><!-- #main -->
<div id="footer">
    
        <div id="copyrights">
            <?php $identitas=mysql_query("SELECT * FROM identitas ORDER BY id_identitas ");
  while($a=mysql_fetch_array($identitas)){
  
  echo" website by $a[nama_website] &copy; 2020  <a href='#'>$a[alamat_website]</a> 
        ";
 }
  ?></div>
    </div><!-- #footer -->
    
</div><!-- #container -->
</body>
</html>
<?php
}
}
?>
