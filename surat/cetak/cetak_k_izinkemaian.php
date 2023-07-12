
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
$con=mysql_query("SELECT * FROM srt_k_izin WHERE id_srt_d='$id_srt_d'");
$hasil=mysql_fetch_array($con);
$isi=1;
mysql_query("UPDATE srt_k_izin SET ket_ctk='$isi' WHERE id_srt_d='$id_srt_d'");
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
.style1 {
	font-size: 25px;
	font-weight: bold;
}
.style4 {font-size: 18px}
.style5 {font-size: 31px}
.style8 {font-size: 18px; font-weight: bold; }
.style9 {font-size: 19px}
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
    <div align="center" class="style5"><strong>PEMERINTAH KABUPATEN Pesawaran</strong></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center" class="style5"><strong><strong>KECAMATAN GEDONG TATAAN </strong></strong></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center"><span class="style1">PEKON GEDONG TATAAN</span></div></td>
  </tr>
  <tr>
    <td height="21" colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="5"><div align="center"><em><strong>Alamat : Jln Raden Intan Gedong Tataan Kec. Gedong Tataan Kab. Pesawaran -35372</strong></em></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="center">================================================================================================== </div></td>
  </tr>
  <tr>
    <td width="24">&nbsp;</td>
    <td colspan="6" class="style4">
      <div align="right">Gedong Tataan,<?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></div>
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="84"><strong>Nomor</strong></td>
    <td colspan="3">: <strong>300/ <?php echo"$hasil[id_srt_d]";?> /III.02.2007 /
      <?php $bln=date("m"); echo"$bln";?>
/
<?php $thn=date("Y"); echo"$thn";?></strong></td>
    <td width="164">Kepala Yth </td>
    <td width="89">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td width="84"><strong>Lamp</strong></td>
    <td width="117">: .....</td>
    <td width="6">&nbsp;</td>
    <td width="386">&nbsp;</td>
    <td width="164">Kapolsek Gedong Tataan </td>
    <td width="89">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td width="84"><strong>Perihal</strong></td>
    <td colspan="3">: <strong>Mohon Diterbitkan Surat izin Pertunjukan/Keramaian</strong></td>
    <td width="164">Di Gedong Tataan</td>
    <td width="89">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td width="84">&nbsp;</td>
    <td width="117">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="386">&nbsp;</td>
    <td width="164">&nbsp;</td>
    <td width="89">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style9">Yang bertanda tangan dibawah ini Kepala Pekon Gedong Tataan Kecamatan Gedong Tataan Kabupaten Pesawaran dengan ini menerangkan bahwa  :</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style4">Nama Lengkap </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[nama]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style4">Jenis Kelamin </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[jk]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style4">Tempat Tanggal Lahir </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[ttl]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style4">Alamat</span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[alamat]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" valign="top"><p align="justify" class="style4">Orang tersebut diatas benar akan melaksanakan <span class="style9">acara</span>, <?php echo"$hasil[acara]";?> pada : </p>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Hari / Tanggal </td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[hari]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style4">Waktu</td>
    <td class="style4">&nbsp;</td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[pukul]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Bertempat di </td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[tempat]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Hiburan </td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[hiburan]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Pimpinan </td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[pimpinan]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style4">Keterangan</td>
    <td class="style4">&nbsp;</td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[ket]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style9">Demikian permohonan ini kami sampaikan, dengan harapan Bapak dapat mengabulkannya, sebelum dan sesudahnya kami ucapkan terimakasih.</span></td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td colspan="2" valign="bottom"><p class="style4">Gedong Tataan  , <?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></p>
      <p class="style4">Kepala Pekon Gedong Tataan </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td colspan="2" rowspan="3" valign="bottom"><div align="center" class="style4">
        <div align="left"></div>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td colspan="2"><span class="style4"><strong>( Abdi Abdul Aji, S.Ip ) </strong></span></td>
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
