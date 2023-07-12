<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

$nama_file = date('DMY').'_laporan_data_penduduk.xls';
	header('Pragma: public');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
	header('Content-Type: application/force-download');
	header('Content-Type: application/octet-stream');
	header('Content-Type: application/download');
	header('Content-Disposition: attachment;filename='.$nama_file.'');
	header('Content-Transfer-Encoding: binary ');
?>
<table bordercolor='#807D79' width='100%' border='1' cellpadding='5' cellspacing='0'>
<tr>
	<th>No.</th>
	 <th>Nama Lengkap</th>
		          	  <th>NIK</th>
		          	  <th>Jns. Kelamin</th>
		          	  <th>Tmpt. Lahir</th>
		          	  <th>Tgl. Lahir</th>
		          	  <th>Agama</th>
		          	  <th>Pendidikan</th>
		          	  <th>Pekerjaan</th>

<?php
$q = mysql_query('SELECT * FROM data_penduduk_detail  ORDER BY id_data_penduduk ASC');
$n = 1;
$hitung=mysql_numrows($q);
while($r = mysql_fetch_array($q))

{
	if($hitung > 100){ $warna="#D87676"; } else {$warna="#B3D577";}
	echo '<tr bgcolor="'.$warna.'">
	<td>'.$n.'</td>
	 <td>'.$r[nama_lengkap].'</td>
			  			 <td>'.$r[nik].'</td>
			  			 <td>'.$r[jenis_kelamin].'</td>
			  			 <td>'.$r[tempat_lahir].'</td>
			  			 <td>'.$r[tanggal_lahir].'</td>
			  			 <td>'.$r[agama].'</td>
			  			 <td>'.$r[pendidikan].'</td>
			  			 <td>'.$r[jenis_pekerjaan].'</td>
	</tr>';
	$n++;
}
?>
</table>
