	    



<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_surat/mod_izinkeramaian/aksi_lajang.php";
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
     Permohonan Surat Izin Keramaian
      </div>
                                
                                <div class='panel-body'>
       ";
	 $cek_username=mysql_num_rows(mysql_query
             ("SELECT * FROM srt_k_izin"));
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
    $tampil=mysql_query("SELECT * FROM srt_k_izin ORDER BY id_srt_d ASC");
        while ($r=mysql_fetch_array($tampil)){
     
	     echo "<tr class=gradeX> <td>$no</td>
            <td>$r[NIK]</td>
            <td>$r[nama]</td>
	    <td align=center>$r[waktu]</td>
	    
	    <td>"; if($r[ket_ctk]=='0'){
					
echo"<a href=media.php?module=izinkeramaian&act=lihat&id=$r[id_srt_d]>lihat</a>";
					
} 
					elseif($r[ket_ctk]=='1')
					
					{
						
						echo"<a href='cetak/cetak_k_izinkemaian.php?id_srt_d=$r[id_srt_d]' target='_blank'  onclick='window.open ('cetak/cetak_k_izinkemaian.php?id_srt_d=$r[id_srt_d]','myWin','resizable=1,status=1,menubar=1,toolbar=1,
	    scrollbars=1,location=1,directories=1,width=350,height=350,top=60,left=60');return false;'>cetak</a>";
					
} echo" 
	    
	    |
		
		<a href=media.php?module=izinkeramaian&act=edit&id=$r[id_srt_d]>edit</a> | 
	    
	    <a href=$aksi?module=izinkeramaian&act=hapus&id=$r[id_srt_d]>hapus</a>
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
        $edit=mysql_query("SELECT * FROM srt_k_izin WHERE id_srt_d='$_GET[id]'");
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
	
   <form method=POST action=$aksi?module=izinkeramaian&act=update>
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
   <input type='text' class='form-control' name=keter value='isi keterangan pengambilan surat' size=40>
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

      <a class='btn btn-primary btn-sm' red' id=reset-validate-form href='?module=izinkeramaian'>Batal</a>
     
      <input type='submit' name='upload' class='btn btn-primary btn-sm' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </div>
                        </div>
                    </div> </div> </div> </div></section>";
    break;

  case "edit":

	        $edit=mysql_query("SELECT * FROM srt_k_izin WHERE id_srt_d='$_GET[id]'");
  $hasil=mysql_fetch_array($edit);  
  echo "<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
   
  edit Surat
  </div>
	 <div class='panel-body'>	

                  <form method=POST action=$aksi?module=izinkeramaian&act=edit>
   <input type=hidden name=id value='$hasil[id_srt_d]'>
                                                
                                                    <label for='author'>Nama <span class='required'>*</span></label>
                                                    <input  name='nama'  value='$hasil[nama]'  id='nama' type='text' class='form-control' aria-required='true'>
                                                </p>
                                               
                                                    <label for='email'>NIK <span class='required'>*</span></label>
                                                    <input  name='nik' value='$hasil[NIK]'  id='nik' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input name='ttl'  value='$hasil[ttl]'  type='text' class='form-control' aria-required='true'>
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
												<label for='email'> No Hp Aktif </label>
                                                    <input name='hp'  type='text' value='$hasil[hp]' class='form-control' aria-required='true'>
												
                                                    <label for='email'>Alamat</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat' cols='45' rows='6' aria-required='true'>$hasil[alamat]</textarea>
                                                </p>
												
												
                                                    <label for='email'>Hari/Tanggal </label>
                                                    <input id='email' name='hari' value='$hasil[hari]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Waktu </label>
                                                    <input id='email' name='pukul' value='$hasil[pukul]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
													
                                                    <label for='email'>Tempat </label>
                                                    <input id='email' name='tempat' value='$hasil[tempat]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
													
                                                    <label for='email'>Hiburan </label>
                                                    <input id='email' name='hiburan' value='$hasil[hiburan]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
															
                                                    <label for='email'>Acara </label>
                                                    <input id='email' name='acara' value='$hasil[acara]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
																
                                                    <label for='email'>Pimpinan </label>
                                                    <input id='email' name='pimpinan' value='$hasil[pimpinan]' type='text' class='form-control' aria-required='true'>
                                                </p>
												
														
                                                    <label for='email'>Keterangan</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='ket' cols='45' rows='6' aria-required='true'>$hasil[ket]</textarea>
                                                </p> 
												<input id='email'  value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' type='hidden' size='30' aria-required='true'>
                                                <p class='form-submit'>
                                                    <input name='submit' class='btn btn-primary btn-sm' type='submit' id='submit' value='update Surat'>
                                                </p>
                                          </form>
                  </div>
                        </div>
                    </div> </div> </div> </div></section>";
					 break;
}
}
?>
