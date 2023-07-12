<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus penduduk
if ($module=='penduduk' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM penduduk WHERE id='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM penduduk WHERE id='$_GET[id]'");
     unlink("../../../foto_berita/$_GET[namafile]");   
     unlink("../../../foto_berita/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM penduduk WHERE id='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}

// Input penduduk
elseif ($module=='penduduk' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tag=implode(',',$tag_seo);
  }            
  $al_seo     = seo_title($_POST['al']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=penduduk)</script>";
    }
    else{
    UploadImage($nama_file_unik);

    mysql_query("INSERT INTO penduduk (al,
                                     al_seo,
                                    nik,
                                    nama,
									ttl,
                                    umur,
									stp,
                                    jk,
                                    NO_hp,
                                    gol_D,
                                    pekerjaan,
									tag,
                                    gambar) 
                            VALUES('$_POST[al]',
                                   '$al_seo',
                                   '$_POST[nik]',
                                   '$_POST[nama]', 
                                   '$_POST[ttl]',
                                   '$_POST[umur]',
                                   '$_POST[stp]',
                                   '$_POST[jk]',
                                   '$_POST[NO_hp]',
								   '$_POST[gol_D]',
								   '$_POST[pekerjaan]',
                                   '$tag',
                                   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO penduduk(al,
                                     al_seo,
                                    nik,
                                    nama,
									ttl,
                                    umur,
									stp,
                                    jk,
                                    NO_hp,
                                    gol_D,
									tag,
									pekerjaan)
                            VALUES('$_POST[al]',
                                   '$al_seo',
                                   '$_POST[nik]',
                                   '$_POST[nama]', 
                                   '$_POST[ttl]',
                                   '$_POST[umur]',
                                   '$_POST[stp]',
                                   '$_POST[jk]',
                                   '$_POST[NO_hp]',
								   '$_POST[gol_D]',
								   '$_POST[pekerjaan]',
                                   '$tag')");
  header('location:../../media.php?module='.$module);
  }
  
  $jml=count($tag_seo);
  for($i=0;$i<$jml;$i++){
    mysql_query("UPDATE tag SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
  }
}

// Update penduduk
elseif ($module=='penduduk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tag=implode(',',$tag_seo);
  }

   $al_seo     = seo_title($_POST['al']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE penduduk SET al       = '$_POST[al]',
                                   al_seo   = '$al_seo', 
                                   nik = '$_POST[nik]',
                                   nama    = '$_POST[nama]',
								   ttl    = '$_POST[ttl]',
								   umur    = '$_POST[umur]',
								   stp   = '$_POST[stp]',
								   jk   = '$_POST[jk]',
								   gol_D  = '$_POST[gol_D]',
								   NO_hp  = '$_POST[NO_hp]',
                                   tag         = '$tag',
                                   pekerjaan  = '$_POST[pekerjaan]'  
                             WHERE id   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=potensi')</script>";
    }
    else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE penduduk SET al       = '$_POST[al]',
                                   al_seo   = '$al_seo', 
                                   nik = '$_POST[nik]',
                                   nama    = '$_POST[nama]',
								   ttl    = '$_POST[ttl]',
								   umur    = '$_POST[umur]',
								   stp   = '$_POST[stp]',
								   jk   = '$_POST[jk]',
								   gol_D  = '$_POST[gol_D]',
								   NO_hp  = '$_POST[NO_hp]',
                                   tag         = '$tag',
                                   pekerjaan  = '$_POST[pekerjaan]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id   = '$_POST[id]'");
   header('location:../../media.php?module='.$module);
   }
  }
}
}
?>
