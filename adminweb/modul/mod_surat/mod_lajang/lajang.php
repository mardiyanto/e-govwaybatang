	    



<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_surat/mod_lajang/aksi_lajang.php";
switch($_GET[act]){
  // Tampil Modul
  default:
        echo "<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
<h3>Permohonan Surat Belum Menikah</h3>
</div>
                                
                                <div class='panel-body'>";
	 $cek_username=mysql_num_rows(mysql_query
             ("SELECT * FROM srt_k_nikah"));
// kalo data tidak ada maka mucul pesan
if ($cek_username <= 0){
  echo "<h3>Data Masih Kosong</h3>";
        
}  else{
	 
	echo"    
	    <table id='example1' class='table table-bordered table-striped'>
	    <thead>
	    <tr>
		<th>No</th>
		<th>NIK</th>
		<th>Nama</th>

		<th>Tanggal Daftar</th>
		<th>Aksi</th>
	
	</tr>
	</thead>
	<tbody>";
	$no=1;
    $tampil=mysql_query("SELECT * FROM srt_k_nikah ORDER BY id_srt_d ASC");
        while ($r=mysql_fetch_array($tampil)){
     
	     echo "<tr class=gradeX><td>$no</td>
            <td>$r[NIK]</td>
            <td>$r[nama]</td>

	    <td align=center>$r[waktu]</td>
	    
	    <td>"; if($r[ket_ctk]=='0'){
					
echo"<a href=media.php?module=lajang&act=lihat&id=$r[id_srt_d]>lihat</a>";
					
} 
					elseif($r[ket_ctk]=='1')
					
					{
						
						echo"<a href='cetak/cetak_k_belumnenikah.php?id_srt_d=$r[id_srt_d]' target='_blank'  onclick='window.open ('cetak/cetak_k_belumnenikah.php?id_srt_d=$r[id_srt_d]','myWin','resizable=1,status=1,menubar=1,toolbar=1,
	    scrollbars=1,location=1,directories=1,width=350,height=350,top=60,left=60');return false;'>cetak</a>";
					
} echo" 
	    
	    |
		
		
		
	    
	    <a href=media.php?module=lajang&act=edit&id=$r[id_srt_d]>edit</a> |  <a href=$aksi?module=lajang&act=hapus&id=$r[id_srt_d]>hapus</a>
            </td>
	  
	    </tr>";  
	
	
	 $no++;
    }
    echo "</tbody>
		</table> 
	       </div>
                        </div>
                    </div> </div> </div> </div></section>
    ";
    
  }

break;

 case "lihat":
        $edit=mysql_query("SELECT * FROM srt_k_nikah WHERE id_srt_d='$_GET[id]'");
  $r=mysql_fetch_array($edit);  
  echo "
   <section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
   
  Lihat Surat
  </div>
                                
                                <div class='panel-body'>
	
   <form method=POST action=$aksi?module=lajang&act=update>
   <input type=hidden name=id value='$r[id_srt_d]'>
		  
   <p class=inline-small-label> 
   <label for=field4>NIK</label>
   <input type='text' class='form-control' name=nik value='$r[NIK]' size=40>
   </p>
    <p class=inline-small-label> 
   <label for=field4>keterangan Surat</label>
   <input type='text' class='form-control' value='$r[ket]' size=40>
   </p>
          <p class=inline-small-label> 
   <label for=field4>alamat</label>
   <input type='text' class='form-control' value='$r[alamat]' size=40>
   </p>
     <p class=inline-small-label> 
   <label for=field4>Keterangan </label>
   <input type='text' class='form-control' placeholder='isi keterangan pengambilan surat' size=40>
   </p>
    <p class=inline-small-label> 
   <label for=field4>No Hp</label>
   <input type='text' class='form-control'  value='$r[hp]' size=40>
   </p>
   
 <p class=inline-small-label> 
   <label for=field4>Nama Lengkap</label>
   <input type='text' class='form-control'  value='$r[nama]' size=40>
   </p>

	 
<br/><br/><div class=block-actions> 

      <a class='btn btn-primary btn-sm' red' id=reset-validate-form href='?module=lajang'>Batal</a>
     
      <input type='submit' name='upload' class='btn btn-primary btn-sm' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </div>
                        </div>
                    </div> </div> </div> </div></section>";
     break;
	 
	 case "edit":
        $edit=mysql_query("SELECT * FROM srt_k_nikah WHERE id_srt_d='$_GET[id]'");
  $hasil=mysql_fetch_array($edit);  
  echo "
   <section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									edit Surat Kalakuan Baik
                                 </div>	        
 <div class='panel-body'>
     
<table class='table table-bordered table-striped'>
     <form method=POST action=$aksi?module=lajang&act=edit>
   <input type=hidden name=id value='$hasil[id_srt_d]'>
     
          <tr><td width=90>NIK</td>     <td> <input type='text' class='form-control' name='nik' value='$hasil[NIK]'  id='nik' size=40></td></tr>
	  <tr><td>Nama Lengkap</td>	<td>  <input type='text' class='form-control' name='nama'  value='$hasil[nama]'  id='nama' size=40></td></tr>
	  <tr><td>Tempat Tgl Lahir</td>	<td> <input type='text' class='form-control' name='ttl'  value='$hasil[ttl] '  size=40></td></tr>
	  <tr><td>Jenis Kelamin</td>	<td> 
                                           
	   <select class='form-control select2' name='jk' id='jk' >
						<option value='$hasil[jk]' select>$hasil[jk]</option>
						<option value='LAKI-LAKI'>LAKI-LAKI</option>
						<option value='PEREMPUAN'>PEREMPUAN</option>
					
						</select></td></tr>
	  <tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat' value='Pekon $hasil[alamat]'   size=30></td></tr>

	  
	  <tr><td>Pekerjaan</td>	  	<td> <input type='text' class='form-control' name='pekerjaan' value='$hasil[pekerjaan]' size=30></td></tr>
	  
	  <tr><td>Kewarganegaraan</td>	  	<td> <input type='text' class='form-control' name='kwrg' value='$hasil[kwrg]' size=10></td></tr></br>
	  
	  
	  <tr><td>Bin/Binti</td>	  	<td> <input type='text' class='form-control' name='bin' value='$hasil[bin]' size=10></td></tr></br>
	  
	  <tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' value='$hasil[hp]' size=10></td></tr></br>
	  
	  <tr><td>Surat Ini Digunakan Untuk</td> <td> <textarea style='width: 100%;' name='ket'  rows='4' cols='3' style='height:100px; width:300px;'>$hasil[ket]</textarea></br>
	  (* silahkan isi keterangan kegunaan surat
	  </td></tr>
	  
	   <tr><td>Wonodadi</td>	  	<td> <input type='text' class='form-control' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang'  size=30></td></tr></br>
	  
	  <tr><td colspan=2><br><br>
		  <button class='btn btn-primary btn-sm' type='submit'><span> update </span></button>
		  <button class='btn btn-primary btn-sm' type='submit' onclick=self.history.back()><span>Batal</span></button></td></tr>
         </form>  </table>   </div>
                        </div>
                    </div> </div> </div> </div></section>";
     break;
}
}
?>
