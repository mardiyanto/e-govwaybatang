
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
$con=mysql_query("SELECT * FROM srt_k_usaha WHERE id_srt_d='$id_srt_d'");
$hasil=mysql_fetch_array($con);
$isi=1;
mysql_query("UPDATE srt_k_usaha SET ket_ctk='$isi' WHERE id_srt_d='$id_srt_d'");
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
    <div align="center" class="style5"><strong>PEMERINTAH KABUPATEN PRINGSEWU</strong></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center" class="style5"><strong><strong>KECAMATAN PAGELARAN </strong></strong></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center"><span class="style1">PEKON KARANGSARI</span></div></td>
  </tr>
  <tr>
    <td height="21" colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="5"><div align="center"><em><strong>Alamat : Jln Raden Intan Karangsari Kec. Pagelaran Kab. Pringsewu -35372</strong></em></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="center">================================================================================================== </div></td>
  </tr>
  <tr>
    <td width="30">&nbsp;</td>
    <td colspan="6" class="style4"><p align="center" class="style8 style4">SURAT KETERANGAN USAHA </p>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style4"><div align="center" class="style8">Nomer :<strong>470</strong>/ <?php echo"$hasil[id_srt_d]";?> /<strong>C.04.2007/
          <?php $bln=date("m"); echo"$bln";?>
    /
          <?php $thn=date("Y"); echo"$thn";?></strong>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="101">&nbsp;</td>
    <td width="102">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td width="376">&nbsp;</td>
    <td width="124">&nbsp;</td>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style9">Saya yang bertanda tangan dibawah ini Kepala Pekon Karangsari Kecamatan Pagelaran Kabupaten Pringsewu menerangkan dengan sebenarnya bahwa : </span></td>
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
    <td colspan="2"><span class="style4">No.NIK </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[NIK]";?></span></td>
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
    <td colspan="2"><span class="style4">Pekerjaan </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[pekerjaan]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style4">Alamat</span></td>
    <td><div align="center" class="style4">:</div></td>
    <td rowspan="2" valign="top"><span class="style4"><?php echo"$hasil[alamat]";?></span><span class="style4"></span></td>
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
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" valign="top"><p align="justify" class="style4">Orang tersebut diatas adalah benar Mempunyai Usaha di Pekon Karangsari dan Kecamatan Pagelaran Kabupaten Pringsewu dan yang bersangkutan sampai dengan Surat Keterangan ini dikeluarkan mempunyai usaha :  </p>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4"></span>
    <p align="center"><strong><u>&ldquo;</u></strong><strong><u><?php echo"$hasil[usaha]";?></u></strong><strong><u>&rdquo;</u></strong><strong><u> </u></strong></p><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style4">Usaha Tersebut diatas berdiri sejak tahun <?php echo"$hasil[tahun]";?>. Surat keterangan ini diminta oleh yang bersangkutan untuk keperluan :</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style4"><span class="style4"></span>
    <p align="center"><strong>&ldquo;</strong><strong><u><?php echo"$hasil[ket]";?></u>&rdquo;</strong></p><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style4">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">&nbsp;</td>
    <td class="style4">&nbsp;</td>
    <td class="style4">&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
    <td colspan="2" valign="bottom"><p class="style4">Karangsari  , <?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></p>
      <p class="style4">Kepala Pekon Karangsari </p></td>
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
    <td colspan="2"><span class="style4"><strong>( <?php echo"$k[nama]";?> ) </strong></span></td>
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
