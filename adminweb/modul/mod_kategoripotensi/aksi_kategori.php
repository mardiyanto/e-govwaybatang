<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Input kategori potensi
if ($module=='katpo' AND $act=='input'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("INSERT INTO katpo(nama_kategori,kategori_seo) VALUES('$_POST[nama_kategori]','$kategori_seo')");
  header('location:../../media.php?module='.$module);
}

// Update kategori potensi
elseif ($module=='katpo' AND $act=='update'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("UPDATE katpo SET nama_kategori='$_POST[nama_kategori]', kategori_seo='$kategori_seo', aktif='$_POST[aktif]' 
               WHERE id_kategori = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
