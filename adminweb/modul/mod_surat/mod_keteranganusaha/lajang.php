	    



<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_surat/mod_keteranganusaha/aksi_lajang.php";
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
<h3>Permohonan Surat Keterangan Usaha</h3>
</div>
                                
                                <div class='panel-body'>
		  
	";
	 $cek_username=mysql_num_rows(mysql_query
             ("SELECT * FROM  srt_k_usaha"));
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
    $tampil=mysql_query("SELECT * FROM  srt_k_usaha ORDER BY id_srt_d ASC");
        while ($r=mysql_fetch_array($tampil)){
     
	     echo "<tr class=gradeX> <td>$no</td>
            <td>$r[NIK]</td>
            <td>$r[nama]</td>

	    <td align=center>$r[waktu]</td>
	    
	    <td>"; if($r[ket_ctk]=='0'){
					
echo"<a href=media.php?module=keteranganusaha&act=lihat&id=$r[id_srt_d]>lihat</a>";
					
} 
					elseif($r[ket_ctk]=='1')
					
					{
						
						echo"<a href='cetak/cetak_k_usaha.php?id_srt_d=$r[id_srt_d]' target='_blank'  onclick='window.open ('cetak/cetak_k_usaha.php?id_srt_d=$r[id_srt_d]','myWin','resizable=1,status=1,menubar=1,toolbar=1,
	    scrollbars=1,location=1,directories=1,width=350,height=350,top=60,left=60');return false;'>Cetak</a>";
					
} echo" 
	    
	    |
	    <a href=media.php?module=keteranganusaha&act=edit&id=$r[id_srt_d]>Edit</a>
			    |
	    <a href=$aksi?module=keteranganusaha&act=hapus&id=$r[id_srt_d]>Hapus</a>
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
        $edit=mysql_query("SELECT * FROM srt_k_usaha WHERE id_srt_d='$_GET[id]'");
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
	
   <form method=POST action=$aksi?module=keteranganusaha&act=update>
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

      <a class='btn btn-primary btn-sm' red' id=reset-validate-form href='?module=keteranganusaha'>Batal</a>
     
      <input type='submit' name='upload' class='btn btn-primary btn-sm' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </div>
                        </div>
                    </div> </div> </div> </div></section>";
     break;
	 
	 case "edit":
        $edit=mysql_query("SELECT * FROM srt_k_usaha WHERE id_srt_d='$_GET[id]'");
  $hasil=mysql_fetch_array($edit);  
  echo "
   <section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
   
  edit Surat
  </div>
                                
                                <div class='panel-body'>
	
   <form method=POST action=$aksi?module=keteranganusaha&act=edit>
   <input type=hidden name=id value='$hasil[id_srt_d]'>
		  
    <label for='author'>Nama <span class='required'>*</span></label>
                                                    <input  name='nama'  value='$hasil[nama]'  id='nama' type='text' class='form-control' aria-required='true'>
                                                </p>
                                               
                                                    <label for='email'>NIK <span class='required'>*</span></label>
                                                    <input  name='nik' value='$hasil[NIK]'  id='nik' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input name='ttl'  value='$hasil[ttl] '  type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Jenis Kelamin </label>
                                                    <select class='form-control select2' name='jk' id='jk' >
						<option value='$hasil[jk]' select>$hasil[jk]</option>
						<option value='LAKI-LAKI'>LAKI-LAKI</option>
						<option value='PEREMPUAN'>PEREMPUAN</option>
					
						</select>
                                                </p>
												
									
                                                    <label for='email'>Pekerjaan </label>
                                                    <input name='pekerjaan' value='$hasil[pekerjaan]' type='text' class='form-control' aria-required='true'>
                                                </p>
												<label for='email'>Hp Yang Aktif </label> <input type='text' class='form-control' value='$hasil[hp]' name='hp' size=10>
												
                                                    <label for='email'>Alamat</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat' cols='45' rows='6' aria-required='true'>$hasil[alamat]</textarea>
                                                </p>
														
                                                    <label for='email'>Jenis Usaha </label>
                                                    <input id='email' name='usaha' value='$hasil[usaha]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tahun Usaha </label>
                                                    <input id='email' name='tahun' value='$hasil[tahun]'  type='text' class='form-control' aria-required='true'>
                                                </p>
												
										
											
                                                    <label for='email'>Surat Ini Digunakan Untuk</label>
													  <input id='email' name='ket' type='text' value='$hasil[ket]' class='form-control' aria-required='true'>
                                                </p>
												<input id='email' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' type='hidden' size='30' aria-required='true'>
                                                <p class='form-submit'>
                                                    <input name='submit' class='btn btn-primary btn-sm' type='submit' id='submit' value='update Surat'>
                                                </p>
                                          </form>
                        </div>
                    </div> </div> </div> </div></section>";
     break;
}
}
?>
