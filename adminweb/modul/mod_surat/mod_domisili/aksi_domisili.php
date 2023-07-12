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
if ($module=='domisili' AND $act=='hapus'){
     mysql_query("DELETE FROM srt_domisili WHERE id_srt_d='$_GET[id]'");
  header('location:../../../media.php?module=domisili');
}


// Update penduduk
elseif ($module=='domisili' AND $act=='update'){
	 mysql_query("INSERT INTO status_surat (nik,nama_surat,keter) 
             VALUES('$_POST[nik]',
			 'Surat Keterangan Domisili',
			 '$_POST[keter]')"); 
	 mysql_query("UPDATE srt_domisili   SET 
                                   ket_ctk         = '1'
               WHERE id_srt_d = '$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan Cetak Surat'); window.location = '../../../media.php?module=domisili'</script>";

  }
  
  // Update penduduk
elseif ($module=='domisili' AND $act=='edit'){
	 mysql_query("UPDATE srt_domisili SET 
									NIK='$_POST[nik]',
                                    nama='$_POST[nama]',                                 
                                    ttl='$_POST[ttl]', 
                                    jk='$_POST[jk]',
                                    alamat='$_POST[alamat]',
                                    agama='$_POST[agama]',
                                    status= '$_POST[status]',
                                    pekerjaan='$_POST[pekerjaan]',
									tahun='$_POST[tahun]',
									hp='$_POST[hp]',
                                    kwrg='$_POST[kwrg]',
                                    ket='$_POST[ket]',
                                    ket_ctk='0'   
					WHERE id_srt_d ='$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan lihat data'); window.location = '../../../media.php?module=domisili'</script>";

  }
}

?>
