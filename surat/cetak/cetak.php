
<?php
//menentukan hari
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $a_hari[date("N")];

//menentukan tanggal
$tanggal = date ("j");

//menentukan bulan
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $a_bulan[date("n")];

//menentukan tahun
$tahun = date("Y");

//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013


?>
<?php
include "../../config/koneksi.php";
$id_srt_d=$_GET['id_srt_d'];
$con=mysql_query("SELECT * FROM srt_domisili WHERE id_srt_d='$id_srt_d'");
$hasil=mysql_fetch_array($con);
$isi=1;
mysql_query("UPDATE srt_domisili SET ket_ctk='$isi' WHERE id_srt_d='$id_srt_d'");
$r=mysql_query("SELECT * FROM k_desa order by id_k DESC");
$k=mysql_fetch_array($r);
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cetak Data</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style4 {font-size: 18px}
.style5 {font-size: 31px}
.style6 {
	font-size: 25px;
	font-weight: bold;
}
.style7 {
	font-size: 18px;
	font-weight: bold;
}
.style8 {font-size: 19px}
-->
</style>
</head>

<body onLoad="window.print()">
<table width="900" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" rowspan="4"><div align="center"></div>      
    <div align="right"></div>    
    <div align="right"><img src="logo.png" width="96" height="119"></div></td>
    <td colspan="5"><div align="center" class="style5"></div>      <div align="center" class="style5"></div>      <div align="center" class="style5"></div>      
    <div align="center" class="style5"><strong>PEMERINTAH KABUPATEN PESAWARAN </strong></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center" class="style5"><strong><strong>KECAMATAN GEDONG TATAAN </strong></strong></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center" class="style6">PEKON Gedong Tataan</div></td>
  </tr>
  <tr>
    <td height="21" colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="5"><div align="center"><em><strong>Alamat : Jln Raden Intan Gedong Tataan Kec. Gedong Tataan Kab. Pesawaran -35372  </strong></em></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="center">================================================================================================== </div></td>
  </tr>
  <tr>
    <td width="42">&nbsp;</td>
    <td colspan="6"><p align="center" class="style4"><strong>SURAT KETERANGAN DOMISILI </strong></p>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><div align="center" class="style7">Nomer :  <strong>470</strong>/ <?php echo"$hasil[id_srt_d]";?> /<strong>C.4.02.07</strong>/
      <?php $thn=date("Y"); echo"$thn";?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="83">&nbsp;</td>
    <td width="121">&nbsp;</td>
    <td width="19">&nbsp;</td>
    <td width="356">&nbsp;</td>
    <td width="124">&nbsp;</td>
    <td width="125">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style8"> Kepala Pekon Gedong Tataan Kecamatan Gedong Tataan Kabupaten Pesawaran menerangkan bahwa : </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Nama Lengkap </span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[nama]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Jenis Kelamin </span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[jk]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Tempat Tanggal Lahir </span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[ttl]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Agama</span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[agama]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Pekerjaan</span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[pekerjaan]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Warganegara</span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[kwrg]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Status Perkawinan</span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[status]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">Alamat</span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[alamat]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8">NIK</span></td>
    <td><div align="center" class="style8">:</div></td>
    <td><span class="style8"><?php echo"$hasil[NIK]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" valign="top"><p align="justify" class="style8">Orang tersebut diatas adalah benar-benar  penduduk Pekon Gedong Tataan Kecamatan Gedong Tataan Kabupaten Pesawaran dan terdaftar  pada Pekon Gedong Tataan Kecamatan Gedong Tataan Kabupaten Pesawaran sejak tahun 1999 sampai dengan sekarang. </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><p class="style8">Surat keterangan ini diperlukan untuk :<em><strong> ' <?php echo"$hasil[ket]";?> ' </strong></em></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><p align="justify" class="style8">Demikian surat keterangan ini dibuat dengan sebenarnya dan supaya dapat dipergunakan sebagaimana mestinya. </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><p class="style8"> Gedong Tataan  , <?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></p>
      <p class="style8">Kepala Pekon Gedong Tataan </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="3"><span class="style8"></span><span class="style8"></span><span class="style8"></span><span class="style8"></span>      <div align="center" class="style4">
        <div align="left"></div>
      </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style8"><strong>(Abdi Abdul Aji, S.Ip) </strong></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
