<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_penduduk/aksi_penduduk.php";
switch($_GET[act]){
  // Tampil penduduk
  default:
    echo "<h2>penduduk</h2>
          <form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=penduduk>
          <div id=paging>Masukkan nama penduduk: <input type=text name='kata'> <input type=submit value=Cari></div>
          </form>
          <input type=button value='Tambah penduduk' onclick=\"window.location.href='?module=penduduk&act=tambahpenduduk';\">";

    if (empty($_GET['kata'])){
    echo "<table>  
          <tr><th>no</th><th>nama</th><th>goldar</th><th>no hp</th><th>umur</th><th>alamat</th><th>jenis kelamin</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM penduduk ORDER BY id DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM penduduk
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td>$r[gol_D]</td>
				<td>$r[NO_hp]</td>
				<td>$r[umur]</td>
				<td>$r[al]</td>
				<td>$r[jk]</td>
		            <td><a href=?module=penduduk&act=editpenduduk&id=$r[id]>Edit</a> | 
		                <a href=\"$aksi?module=penduduk&act=hapus&id=$r[id]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM penduduk"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
 
    break;    
    }
    else{
    echo "<table>  
          <tr><th>no</th><th>nama</th><th>goldar</th><th>aksi</th></tr>";

    $p      = new Paging9;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM penduduk WHERE nama LIKE '%$_GET[kata]%' ORDER BY id DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM penduduk
                           WHERE username='$_SESSION[namauser]'
                           AND nama LIKE '%$_GET[kata]%'       
                           ORDER BY id DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td>$r[gol_D]</td>
		            <td><a href=?module=penduduk&act=editpenduduk&id=$r[id]>Edit</a> | 
		                <a href='$aksi?module=penduduk&act=hapus&id=$r[id]&namafile=$r[gambar]'>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE nama LIKE '%$_GET[kata]%'"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM penduduk WHERE username='$_SESSION[namauser]' AND nama LIKE '%$_GET[kata]%'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
 
    break;    
    }

  
  case "tambahpenduduk":
    echo "<h2>Tambah penduduk</h2>
          <form method=POST action='$aksi?module=penduduk&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td width=70>nama</td>     <td> : <input type=text name='nama' size=60></td></tr>
          <tr><td width=70>nik</td>     <td> : <input type=text name='nik' size=60></td></tr>
          <tr><td width=70>tempat tanggal lahir</td>     <td> : <input type=text name='ttl' size=60></td></tr>
		  <tr><td width=70>umur</td>     <td> : <input type=text name='umur' size=60></td></tr>
		  <tr><td>status</td>  <td> : <select name='stp'><option value=0 selected>- Pilih status perkawinan -</option>
        <option value=sudah nikah selected>sudah nikah</option>
		<option value=belum nikah selected>belum nikah</option></select>
		</td></tr>
		<tr><td>jenis kelamin</td>  <td> : <select name='jk'><option value=0 selected>- Pilih jenis kelamin -</option>
        <option value=laki-laki selected>laki-laki</option>
		<option value=perempuan selected>perempuan</option></select>
		</td></tr>
		   <tr><td width=70>NO HP</td>     <td> : <input type=text name='NO_hp' size=60></td></tr>
		   <tr><td>Golongan Darah</td>  <td> : <select name='gol_D'><option value=0 selected>- Pilih goloangan darah -</option>
        <option value=A selected>A</option>
		<option value=B selected>B</option>
		<option value=AB selected>AB</option>
		<option value=O selected>O</option></select>
		</td></tr>
		   <tr><td width=70>pekerjaan</td>     <td> : <input type=text name='pekerjaan' size=60></td></tr>
          <tr><td>Alamat</td>  <td> <textarea name='al' style='width: 300px; height: 150px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>";

    $tag = mysql_query("SELECT * FROM tag ORDER BY tag_seo");
    echo "<tr><td>Tag (Label)</td><td> ";
    while ($t=mysql_fetch_array($tag)){
      echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag] ";
    }
    
    echo "</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
    
  case "editpenduduk":
    if ($_SESSION[leveluser]=='admin'){
      $edit = mysql_query("SELECT * FROM penduduk WHERE id='$_GET[id]'");
    }
    else{
      $edit = mysql_query("SELECT * FROM penduduk WHERE id='$_GET[id]' AND username='$_SESSION[namauser]'");
    }

    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit penduduk</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=penduduk&act=update>
          <input type=hidden name=id value=$r[id]>
          <table>
		  <tr><td>Nama</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>
          <tr><td width=70>Nik</td>     <td> : <input type=text name='nik' size=30 value='$r[nik]'></td></tr>
		  <tr><td>Tempat tanggal lahir</td><td>     : <input type=text name='ttl' size=30 value='$r[ttl]'></td></tr>
		  <tr><td>Umur</td><td>     : <input type=text name='umur' size=30 value='$r[umur]'></td></tr>
          <tr><td>status perkawinan</td>  <td> : <select name='stp'>
		  <option value=r[stp] selected>$r[stp]</option>
		  <option value=sudah nikah>sudah nikah</option>
		<option value=belum nikah >belum nikah</option>
</select></td></tr>
<tr><td>jenis kelamin</td>  <td> : <select name='jk'>
		  <option value=$r[jk] selected>$r[jk]</option>
		 <option value=laki-laki >laki-laki</option>
		<option value=perempuan >perempuan</option>
</select></td></tr>
<tr><td>golongan darah</td>  <td> : <select name='gol_D'>
		  <option value=$r[gol_D] selected>$r[gol_D]</option>
		  <option value=A selected>A</option>
		<option value=B selected>B</option>
		<option value=AB selected>AB</option>
		<option value=O selected>O</option>
</select></td></tr>
<tr><td>no HP</td><td>     : <input type=text name='NO_hp' size=30 value='$r[NO_hp]'></td></tr>
<tr><td>PEKERJAAN</td><td>     : <input type=text name='pekerjaan' size=30 value='$r[pekerjaan]'></td></tr>";
      echo "<tr><td>alamat</td>   <td> <textarea name='al' style='width: 350px; height: 250px;'>$r[al]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  ";
          if ($r[gambar]!=''){
              echo "<img src='../foto_berita/small_$r[gambar]'>";  
          }
    echo "</td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    $d = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r[tag]);


    echo "<tr><td>Tag (Label)</td><td> $d </td></tr>";
 
    echo  "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}

}
?>
