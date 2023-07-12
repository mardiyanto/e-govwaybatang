<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../../config/koneksi.php";

include "../../../../config/fungsi_thumb.php";
include "../../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus surat lajang
if ($module=='keteranganusaha' AND $act=='hapus'){

     mysql_query("DELETE FROM srt_k_usaha WHERE id_srt_d='$_GET[id]'");
 
  header('location:../../../media.php?module=keteranganusaha');
}

// Update penduduk
elseif ($module=='keteranganusaha' AND $act=='update'){
	 mysql_query("INSERT INTO status_surat (nik,nama_surat,keter) 
             VALUES('$_POST[nik]',
			 'Surat Keterangan Domisili',
			 '$_POST[keter]')"); 
	 mysql_query("UPDATE srt_k_usaha  SET 
                                   ket_ctk         = '1'
               WHERE id_srt_d = '$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan Cetak Surat'); window.location = '../../../media.php?module=keteranganusaha'</script>";

  }
elseif ($module=='keteranganusaha' AND $act=='edit'){
	 mysql_query("UPDATE srt_k_usaha SET 
									NIK='$_POST[nik]',
                                    nama='$_POST[nama]',
                                    ttl='$_POST[ttl]', 
                                    jk='$_POST[jk]',
                                    alamat='$_POST[alamat]',
									usaha='$_POST[usaha]',
									tahun='$_POST[tahun]',
                                    status='$_POST[status]',
                                    pekerjaan='$_POST[pekerjaan]',
									hp='$_POST[hp]',
                                    kwrg='$_POST[kwrg]',
                                    ket='$_POST[ket]',                                        
                                    ket_ctk='0'   
					WHERE id_srt_d  ='$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan lihat data'); window.location = '../../../media.php?module=keteranganusaha'</script>";

  }
}
?>
