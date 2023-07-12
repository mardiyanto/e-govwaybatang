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
if ($module=='kuasa' AND $act=='hapus'){

     mysql_query("DELETE FROM srt_k_kuasa WHERE id_srt_d='$_GET[id]'");
 
  header('location:../../../media.php?module=kuasa');
}

// Update penduduk
elseif ($module=='kuasa' AND $act=='update'){
	 mysql_query("INSERT INTO status_surat (nik,nama_surat,keter) 
             VALUES('$_POST[nik]',
			 'Surat Keterangan Domisili',
			 '$_POST[keter]')"); 
	 mysql_query("UPDATE srt_k_kuasa  SET 
                                   ket_ctk         = '1'
               WHERE id_srt_d = '$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan Cetak Surat'); window.location = '../../../media.php?module=kuasa'</script>";

  }
elseif ($module=='kuasa' AND $act=='edit'){
	 mysql_query("UPDATE srt_k_kuasa SET 
									NIK='$_POST[nik]',
                                    nama='$_POST[nama]',
                                    ttl='$_POST[ttl]', 
                                    jk='$_POST[jk]',
                                    alamat='$_POST[alamat]',
                                    status='$_POST[status]',
                                    pekerjaan='$_POST[pekerjaan]',
									hp='$_POST[hp]',
									nik_kuasa='$_POST[nik_kuasa]',
                                    nama_kuasa='$_POST[nama_kuasa]',
                                    ttl_kuasa='$_POST[ttl_kuasa]',
                                    jk_kuasa='$_POST[jk_kuasa]',
                                    alamat_kuasa='$_POST[alamat_kuasa]',
                                    pekerjaan_kuasa='$_POST[pekerjaan_kuasa]',
                                    kwrg='$_POST[kwrg]',
                                    ket='$_POST[ket]',                                        
                                    ket_ctk='0'   
					WHERE id_srt_d  ='$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan lihat data'); window.location = '../../../media.php?module=kuasa'</script>";

  }
}
?>
