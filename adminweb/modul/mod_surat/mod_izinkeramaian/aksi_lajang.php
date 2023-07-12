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
if ($module=='izinkeramaian' AND $act=='hapus'){

     mysql_query("DELETE FROM srt_k_izin WHERE id_srt_d='$_GET[id]'");
 
  header('location:../../../media.php?module=izinkeramaian');
}

// Update penduduk
elseif ($module=='izinkeramaian' AND $act=='update'){
	 mysql_query("INSERT INTO status_surat (nik,nama_surat,keter) 
             VALUES('$_POST[nik]',
			 'Surat Keterangan Domisili',
			 '$_POST[keter]')"); 
	 mysql_query("UPDATE srt_k_izin  SET 
                                   ket_ctk         = '1'
               WHERE id_srt_d = '$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan Cetak Surat'); window.location = '../../../media.php?module=izinkeramaian'</script>";

  }
  
 // Update penduduk
elseif ($module=='izinkeramaian' AND $act=='edit'){
	 mysql_query("UPDATE srt_k_izin SET 
									NIK='$_POST[nik]',
                                    nama='$_POST[nama]',                                 
                                    ttl='$_POST[ttl]', 
                                    jk='$_POST[jk]',
                                    alamat='$_POST[alamat]',
                                    acara='$_POST[acara]',
                                    pekerjaan='$_POST[pekerjaan]',
									hp='$_POST[hp]',
                                    hari='$_POST[hari]',
                                    ket='$_POST[ket]',
                                    pukul='$_POST[pukul]',
                                    tempat='$_POST[tempat]',
                                    hiburan='$_POST[hiburan]',
                                    pimpinan='$_POST[pimpinan]',                        
                                    ket_ctk='0'   
					WHERE id_srt_d ='$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan lihat data'); window.location = '../../../media.php?module=izinkeramaian'</script>";

  }
}


?>
