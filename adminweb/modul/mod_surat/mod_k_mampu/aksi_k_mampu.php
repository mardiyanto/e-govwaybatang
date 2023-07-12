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
if ($module=='ket_mampu' AND $act=='hapus'){

     mysql_query("DELETE FROM srt_k_mampu WHERE id_srt_k_mampu='$_GET[id]'");
 
  header('location:../../../media.php?module=domisili');
}

// Update penduduk
elseif ($module=='ket_mampu' AND $act=='update'){
	 mysql_query("INSERT INTO status_surat (nik,nama_surat,keter) 
             VALUES('$_POST[nik]',
			 'Surat Keterangan Domisili',
			 '$_POST[keter]')"); 
	 mysql_query("UPDATE srt_k_mampu  SET 
                                   ket_ctk         = '1'
               WHERE id_srt_k_mampu = '$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan Cetak Surat'); window.location = '../../../media.php?module=ket_mampu'</script>";

  }
  elseif ($module=='ket_mampu' AND $act=='edit'){
	 mysql_query("UPDATE srt_k_mampu SET 
									nama='$_POST[nama]',
									nik='$_POST[nik]',
                                    ttl='$_POST[ttl]', 
                                    jk='$_POST[jk]',
									jk_ortu='$_POST[jk_ortu]',
									ttl_ortu='$_POST[ttl_ortu]',
                                    alamat='$_POST[alamat]',
									kwrg='$_POST[kwrg]',
									kwrg_ortu='$_POST[kwrg_ortu]',
									pekerjaan='$_POST[pekerjaan]',
									hp='$_POST[hp]',
                                    nama_ortu='$_POST[nama_ortu]',
									alamat_ortu='$_POST[alamat_ortu]',
                                    pekerjaan_ortu='$_POST[pekerjaan_ortu]',
									t_tinggal='$_POST[t_tinggal]',
                                    ket='$_POST[ket]',                                                    
                                    ket_ctk='0'   
					WHERE id_srt_k_mampu  ='$_POST[id]'");
echo "<script>alert(' Data Terupdate Silahkan lihat data'); window.location = '../../../media.php?module=ket_mampu'</script>";

  }
}
?>
