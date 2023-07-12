
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
$id_srt_d=$_GET['id_srt_k_mampu'];
$con=mysql_query("SELECT * FROM srt_k_mampu WHERE id_srt_k_mampu='$id_srt_d'");
$hasil=mysql_fetch_array($con);
$isi=1;
mysql_query("UPDATE srt_k_mampu SET ket_ctk='$isi' WHERE id_srt_k_mampu='$id_srt_d'");
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
    <td width="28">&nbsp;</td>
    <td colspan="6" class="style4"><p align="center" class="style8 style4"><strong>SURAT KETERANGAN TIDAK MAMPU/MISKIN</strong></p>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style4"><div align="center" class="style8">Nomer :<strong>470</strong>/ <?php echo"$hasil[id_srt_k_mampu]";?> /<strong>C.04.2007/
          <?php $bln=date("m"); echo"$bln";?>
    /
          <?php $thn=date("Y"); echo"$thn";?></strong>
</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="115">&nbsp;</td>
    <td width="87">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="380">&nbsp;</td>
    <td width="124">&nbsp;</td>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style9">Yang bertanda tangan dibawah ini Kepala Pekon Gedong Tataan Kecamatan Gedong Tataan Kabupaten Pesawaran, menerangkan bahwa :</span></td>
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
    <td colspan="2"><span class="style4">NIK </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[nik]";?></span></td>
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
    <td colspan="2"><span class="style4">Jenis Kelamin </span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[jk]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style4">Pekerjaan</span></td>
    <td><div align="center" class="style4">:</div></td>
    <td><span class="style4"><?php echo"$hasil[pekerjaan]";?></span></td>
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
    <td colspan="6" valign="top"><p align="justify" class="style4">Bahwa yang namanya tersebut diatas benar anak kandung dari :</p>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Nama Lengkap</td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[nama_ortu]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Tempat Tanggal Lahir </td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[ttl_ortu]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Jenis Kelamin </td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[jk_ortu]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Pekerjaan</td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[pekerjaan_ortu]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Kewarganegaraan</td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[kwrg_ortu]";?></span></td>
    <td><span class="style4"></span></td>
    <td><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style4">Alamat</td>
    <td class="style4"><div align="center" class="style4">:</div></td>
    <td class="style4"><span class="style4"><?php echo"$hasil[alamat_ortu]";?></span></td>
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
    <td colspan="6" class="style4">Bahwa benar, warga kami tersebut diatas adalah tergolong keluarga tidak mampu. Surat keterangan ini diminta untuk Persyaratan:</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4"></span>
      <p align="center"><strong><u>&ldquo; </u></strong><strong><u><?php echo"$hasil[ket]";?></u></strong><strong><u> &rdquo;</u></strong></p><span class="style4"></span></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="6"><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4"></span><span class="style4">Demikian surat keterangan ini kami buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.</span></td>
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
