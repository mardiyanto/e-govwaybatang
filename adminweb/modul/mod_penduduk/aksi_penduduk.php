<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "<link href='../../css/zalstyle.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../../favicon.png' />
  
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  <img src='../../img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  </section>
  <section id='error-text'>
  <p><a class='button' href='../../index.php'> <b>LOGIN DI SINI</b> </a></p>
  </section>
  </div>";}
  
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus sekilas info
if ($module=='penduduk' AND $act=='hapus'){
  mysql_query("DELETE FROM data_penduduk WHERE id_data_penduduk='$_GET[id]'");
  mysql_query("DELETE FROM data_penduduk_detail WHERE id_data_penduduk='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='penduduk' AND $act=='tambahdata'){
  		mysql_query("INSERT INTO data_penduduk VALUES('$_POST[a]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]')");
	  		$_SESSION['id_data_penduduk'] = mysql_insert_id();
 echo "<script>window.alert('Data sukses Tersimpan!');
                                  window.location=('../../media.php?module=penduduk')</script>";
}
}
?>
