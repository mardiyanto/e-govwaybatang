	    



<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_surat/mod_k_mati/aksi_k_mati.php";
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
   <h3>Permohonan Surat Keterangan Kematian</h3>
      </div>
                                
                                <div class='panel-body'>
		  ";
	 $cek_username=mysql_num_rows(mysql_query
             ("SELECT * FROM srt_k_mati "));
// kalo data tidak ada maka mucul pesan
if ($cek_username <= 0){
  echo "<h3>Data Masih Kosong</h3>";
        
}  else{
	 
	echo"    
	    <table id='example1' class='table table-bordered table-striped'>
	    <thead>
	    <tr>
		<th>No</th>
		
		<th>Nama</th>
		<th>Alamat</th>
		<th>Jenis Kelamin</th>
		<th>Meninggal Pada Waktu</th>

		<th>Aksi</th>
	
	</tr>
	</thead>
	<tbody>";
	$no=1;
    $tampil=mysql_query("SELECT * FROM srt_k_mati ORDER BY id_srt_k_mati ASC");
        while ($r=mysql_fetch_array($tampil)){
     
	     echo "<tr class=gradeX> <td>$no</td>
            
            <td>$r[nama]</td>
            <td align=center>$r[alamat]</td>
            <td align=center>$r[jk]</td>
	
	    <td align=center>$r[hari], $r[pukul]</td>

	    
	    <td>"; if($r[ket_ctk]=='0'){
					
echo"<a href=media.php?module=k_mati&act=lihat&id=$r[id_srt_k_mati]>lihat</a>";
					
} 
					elseif($r[ket_ctk]=='1')
					
					{
						
						echo"<a href='cetak/cetak_k_mati.php?id_srt_k_mati=$r[id_srt_k_mati]' target='_blank'  onclick='window.open ('cetak/cetak_k_mati.php?id_srt_k_mati=$r[id_srt_k_mati]','myWin','resizable=1,status=1,menubar=1,toolbar=1,
	    scrollbars=1,location=1,directories=1,width=350,height=350,top=60,left=60');return false;'>cetak</a>";
					
} echo" 
	    
	    |
	    <a href=media.php?module=k_mati&act=edit&id=$r[id_srt_k_mati]>edit</a>
		 |
	    <a href=$aksi?module=k_mati&act=hapus&id=$r[id_srt_k_mati]>hapus</a>
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
        $edit=mysql_query("SELECT * FROM srt_k_mati  WHERE id_srt_k_mati='$_GET[id]'");
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
	
   <form method=POST action=$aksi?module=k_mati&act=update>
   <input type=hidden name=id value='$r[id_srt_k_mati]'>
		  
   <p class=inline-small-label> 
   <label for=field4>NIK</label>
   <input type='text' class='form-control' name=nik value='$r[nik]' size=40>
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
     
      <a class='btn btn-primary btn-sm' red' id=reset-validate-form href='?module=k_mati'>Batal</a>
      
      <input type='submit' name='upload' class='btn btn-primary btn-sm' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>

	  </form> 
	       </div>
                        </div>
                    </div> </div> </div> </div></section>";
     break;

 case "edit":
        $edit=mysql_query("SELECT * FROM srt_k_mati  WHERE id_srt_k_mati='$_GET[id]'");
  $r=mysql_fetch_array($edit);  
  echo "
<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									EDIT KETERANGAN KEMATIAN
                                 </div>
                      <div class='panel-body'>
 <table class='table table-bordered table-striped'>
    <form method=POST action=$aksi?module=k_mati&act=edit>
   <input type=hidden name=id value='$r[id_srt_k_mati]'>
                    <thead>
          <p>Nama Penduduk Yang Meninggal</p>
	  <tr><td>Nama Lengkap</td>	<td>  <input type='text' class='form-control' name='nama'  value='$r[nama]' size=20 id='nama'></td></tr>
	  <tr><td>Jenis Kelamin</td>	<td> <select class='form-control select2' name='jk' id='jk'>
						<option value='$r[jk]' select >$r[jk]</option>
						<option value='Laki-Laki' >Laki-Laki</option>
						<option value='Perempuan' >Perempuan</option>
						</select></td></tr>
	  <tr><td>Tempat Tanggal Lahir</td>	<td> <input type='text' class='form-control' name='ttl' value='$r[ttl]' size=20 id='kosong'></td></tr>
	  <tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' value='$r[hp]' size=10></td></tr></br>
	<tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat' value='$r[alamat]'  size=30 id='kosong'></td></tr>
	
	
	<tr><td style='background:#999999; padding:6px;'>Keterangan Meninggal</td>
	<tr><td></td>
	 <tr><td>Hari/Tanggal</td>	<td>  <input type='text' class='form-control' name='hari' value='$r[hari]' size=40></td></tr>
	  <tr><td>Pukul</td>		<td> <input type='text' class='form-control' name='pukul' value='$r[pukul]' size=40></td></tr>
	  <tr><td>Tempat Meninggal</td>	<td> <input type='text' class='form-control' name='tempat' value='$r[tempat]'  size=30></td></tr>
	  <tr><td>Sebab Meninggal</td>	<td> <input type='text' class='form-control' name='sebab' value='$r[sebab]' size=30></td></tr>
	   <tr><td>Dimakamkan di</td>	<td> <input type='text' class='form-control' name='dimakam' value='$r[dimakam]' size=30></td></tr>
	  <input type='hidden' class='form-control' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' readonly size=30>
	

	  <tr><td colspan=2><br><br>
		  <button class='btn btn-primary btn-sm' type='submit' class='button'><span> Update </span></button>
		  <button class='btn btn-primary btn-sm' type='submit' onclick=self.history.back() class='button'><span>Batal</span></button></td></tr>
          </form>  </table> 
 
	       </div>
                        </div>
                    </div> </div> </div> </div></section>";
     break;
}
}
?>
