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

// Hapus surat domisili
if ($module=='k_mati' AND $act=='hapus'){

     mysql_query("DELETE FROM srt_k_mati WHERE id_srt_k_mati='$_GET[id]'");
 
  header('location:../../../media.php?module=k_mati');
}

// Update penduduk
elseif ($module=='k_mati' AND $act=='update'){
	 mysql_query("INSERT INTO status_surat (nik,nama_surat,keter) 
             VALUES('$_POST[nik]',
			 'Surat Keterangan Domisili',
			 '$_POST[keter]')"); 
	 mysql_query("UPDATE srt_k_mati  SET 
                                   ket_ctk         = '1'
               WHERE id_srt_k_mati = '$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan Cetak Surat'); window.location = '../../../media.php?module=k_mati'</script>";

  }
elseif ($module=='k_mati' AND $act=='edit'){
	 mysql_query("UPDATE srt_k_mati SET 
									nik='$_POST[nik]',
                                    nama='$_POST[nama]',                                 
                                    ttl='$_POST[ttl]', 
                                    jk='$_POST[jk]',
                                    alamat='$_POST[alamat]',
                                    hari='$_POST[hari]',
									pukul='$_POST[pukul]',
									hp='$_POST[hp]',
                                    tempat='$_POST[tempat]',
									sebab='$_POST[sebab]',
									dimakam='$_POST[dimakam]',                                                 
                                    ket_ctk='0'   
					WHERE id_srt_k_mati  ='$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan lihat data'); window.location = '../../../media.php?module=k_mati'</script>";

  }
}

?>
