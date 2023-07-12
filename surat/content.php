 <?php
 include "../config/koneksi.php";
	include "../config/fungsi_indotgl.php";
	include "../config/class_paging.php";
	include "../config/fungsi_combobox.php";
	include "../config/library.php";
  include "../config/fungsi_autolink.php";
  include "../config/fungsi_badword.php";
  include "../config/fungsi_kalender.php";
  include "../config/fungsi_thumb.php";
 include "../config/option.php";
//menentukan hari
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $a_hari[date("N")];

//menentukan tanggal
$tanggal = date ("j");
//jam sekrang
$jam = date("h:i:sa");
//menentukan bulan
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $a_bulan[date("n")];

//menentukan tahun
$tahun = date("Y");

//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013


?>
 
<script language="javascript">
function validasi_cari(form){

search=/^[0-9\_\ \-]{0,16}$/;
       if (!search.test(form.search.value)){
          alert ('Kode Surat Harus Valid ! Perbaiki dan coba sekali lagi. !');
          form.search.focus();
          return false;
       }
  return (true);
}
</script>
<script language="javascript">
function validasi_domisili(form){
   
  if (form.ket.value == ""){
    alert("Anda belum mengisikan Keterangan surat.");
    form.ket.focus();
    return (false);
  }
  return (true);
}
</script>

<?php

if ($_GET['module']=='home'){  
    if($_SESSION[nik]==''){
       echo"
      <script>window.alert('Maaf Anda harus login terlebih dahulu !');
        window.location=('http://localhost/desa/surat/')</script>";
    }else{
$sql="select * from data_penduduk_detail where nik='$_SESSION[nik]'";
		$hasil=mysql_query($sql);
		$b=mysql_fetch_array($hasil);
		echo"
<section class='content'>
<div class='row'>

        <div class='col-xs-12'>
              <div class='panel panel-primary'>
			   <div class='table-responsive'> <div class='box-header'>
				   <h3 class='box-title'>Layanan Penduduk $b[nama_lengkap]</h3>
                </div>
       
			
				  <div class='box-header'>
				  	<p>*) Keterangan</br>
	1. Silahkan Pilih Layanan Surat yang anda butuhkan</br>
	2. Isilah FOrm surat yang anda butuhkan dengan benar </br>
	3. Catat ID surat anda untuk konfirmasi selanjutnya</br></br>
 </div>
                <div class='box-body'>
				
		<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                    <thead>
					<tr>
	<th>No.</th>
	<th>Jenis Layanan</th>
</tr></thead>
                    <tbody>
								
						<tr >
						<td>1</td>
			      			<td><h4><a href='surat_domisili.html'>Surat Domisili</a></h4></td>
			                
					  </tr>
					  	<tr >
						<td>2</td>
			      			<td><h4><a href='kelakuanbaik.html'>Surat Keterangan Kelakuan Baik</a></h4></td>
			                
					  </tr>
					  	<tr >
						<td>3</td>
			      			<td><h4><a href='surat_keterangan_kematian.html'>Surat Keterangan Kematian</a></h4></td>
			                
					  </tr>
					  	<tr >
						<td>4</td>
			      			<td><h4><a href='surat_kurang_mampu.html'>Surat Keterangan Kurang Mampu</a></h4></td>
			                
					  </tr>
					  	<tr >
						<td>5</td>
			      			<td><h4><a href='belumnikah.html'>Surat Keterangan Belum Menikah</a></h4></td>
			                
					  </tr>
					  	<tr >
						<td>6</td>
			      			<td><h4><a href='surat_usaha.html'>Surat Keterangan Usaha</a></h4></td>
			                
					  </tr>
					  	<tr >
						<td>7</td>
			      			<td><h4><a href='surat_kuasa.html'>Surat Kuasa</a></h4></td>
			                
					  </tr>
					    	<tr >
						<td>8</td>
			      			<td><h4><a href='surat_izin.html'>Surat Izin Keramaian</a></h4></td>
			                
					  </tr>
				

   
   
		 
		      
		     		   
	";
		  echo"
      </tbody></table>
    </div></div>
                        </div>
                    </div> </div> </div> </div></section>";
  
   
			  }

}

 
 //surat layanan domisili
elseif($_GET['module']=='surat_domisili'){
   $sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);
  echo"   
<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									SURAT KETERANGAN DOMISILI
                                 </div>
  <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>
    
    1. Silahkan isi form surat permohonan Domisili dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    </br>
    

    Terimakasih</p>
    </div>
 
      <div class='panel-body'>
     
     <table id='example1' class='table table-bordered table-striped'>
	 <form method='post' action='proses_domisili.html' onclick='' style='margin-left:46px;' class='AdvancedForm' class='basic-grey' >
         <input type='hidden'  name='id_srt_d' >
		  <tr><td width=120>NIK</td>     <td> <input type='text' class='form-control' name='nik' value='$hasil[nik]' readonly size=40 id='nik' maxlength='16'></td></tr>
	  <tr><td>Nama Lengkap</td>	 <td>  <input type='text' class='form-control' name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' size=40></td></tr>
	  <tr><td>Tempat Tgl Lahir</td>	 <td> <input type='text' class='form-control' name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir]' readonly id='kosong' size=40></br>
	  
	  </td></tr>
	   <tr><td>Jenis Kelamin</td>	<td> <input type='text' class='form-control' name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' size=20></td></tr>
	  <tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat' value='Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos]' readonly size=30></td></tr>
	  <tr><td>Agama</td>		<td> :	 
	  <select class='form-control select2' name='agama' id='agama' readonly>
						<option value='Islam'>Islam</option>
						<option value='Kristen'>Kriseten</option>
						<option value='Hindu'>Hindu</option>
						<option value='Budha'>Budha</option>
						</select>
	  </td></tr>
	  <tr><td>Status</td>		<td> 	<select class='form-control select2' name='status' id='status' readonly>
						<option value='Nikah'>Nikah</option>
						<option value='Belum Nikah'>Belum Nikah</option>
						<option value='Janda/Duda'>Janda/Duda</option>
						</select></td></tr>
	  
	  <tr><td>Pekerjaan</td>	  	<td> <input type='text' class='form-control' name='pekerjaan' value='$hasil[jenis_pekerjaan]' id='kosong' size=30></td></tr>
	  
	  <tr><td>Sejak Tahun</td>	  	<td> <input type='text' class='form-control' name='tahun'  id='kosong' size=30></td></tr>
	 <tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' size=10></td></tr></br>
	  <tr><td>Kewarganegaraan</td>	  	<td> :	<select class='form-control select2' name='kwrg' id='kwrg'>
						<option value='WNI'>WNI</option>
						
						</select>
	  </td></tr></br>
	  
	  
	  <tr><td>Surat Ini Digunakan Untuk</td> <td> <textarea style='width: 100%;' name='ket' rows='4' cols='15' id='kosong' class='textarea'></textarea></br>
	  (* silahkan isi keterangan kegunaan surat
	  </td></tr>
	  
	   <tr><td>Karangsari</td>	  	<td> <input type='text' class='form-control' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' readonly size=30></td></tr></br>
	  
	  <tr><td colspan=2><br><br>
		  <button class='btn btn-primary btn-sm' type='submit' class='button'><span> Daftar </span></button>
		  <button class='btn btn-primary btn-sm' type='submit' onclick=self.history.back() class='button'><span>Batal</span></button></td></tr>
         </form> </table></div></div> ";  
}

//proses simpan surat domisili
elseif($_GET['module']=='proses_domisili'){
   session_start();
 
   $sisipkan="INSERT INTO srt_domisili(NIK,
                                    nama,
                                    ttl,
                                    jk,
                                    alamat,
                                    agama,
                                    status,
                                    pekerjaan,
									tahun,
									hp,
                                    kwrg,
                                    ket,
                                    waktu                                    
                                    )  
                            VALUES('$_POST[nik]',
                                   '$_POST[nama]',
                                   '$_POST[ttl]', 
                                   '$_POST[jk]',
                                   '$_POST[alamat]',
                                   '$_POST[agama]',
                                   '$_POST[status]',
                                   '$_POST[pekerjaan]',
								   '$_POST[tahun]',
								   '$_POST[hp]',
                                   '$_POST[kwrg]',
                                   '$_POST[ket]',
                                   '$_POST[waktu]'
                                   
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_domisili order by id_srt_d DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
  echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_domisili.php?id_srt_d=$hasil[id_srt_d]'</script>";
}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}
}
    
 //surat keterangan kurang mampu
elseif($_GET['module']=='surat_kurang_mampu'){
   $sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);

 
  echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									SURAT KETERANGAN TIDAK MAMPU/MISKIN
                                 </div>
  <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>
    
    1. Silahkan isi form surat permohonan Domisili dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    </br>
    

    Terimakasih</p>
    </div>
 
                      <div class='panel-body'>

<form name='form1' id='form_combo' role='form'  method='post' action='proses_surat_kurang_mampu.html'>

                                                
                                                    <label for='author'>Nama <span class='required'>*</span></label>
                                                    <input  name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' type='text' class='form-control' aria-required='true'>
                                            
                                               
                                                    <label for='email'>NIK <span class='required'>*</span></label>
                                                    <input  name='nik' value='$hasil[nik]' readonly id='nik' type='text' class='form-control' aria-required='true'>
                                             
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir] ' readonly type='text' class='form-control' aria-required='true'>
                                              
												
												
                                                    <label for='email'>Jenis Kelamin </label>
                                                    <input name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' type='text' class='form-control' aria-required='true'>
                                              
												
									
                                                    <label for='email'>Pekerjaan </label>
                                                    <input name='pekerjaan' value='$hasil[jenis_pekerjaan]' type='text' class='form-control' aria-required='true'>
                                          
												 <label for='email'>No Hp Aktif </label>
                                                    <input name='hp'  type='text' class='form-control' aria-required='true'>
                                          
												
                                                    <label for='email'>Alamat</label>
                                             
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat' cols='45' rows='6' aria-required='true'>Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos] </textarea>
                                               

										 <div id='respond' class='comment-respond' data-showonscroll='true' data-animation='fadeIn'>
                                            <h3 id='reply-title' class='comment-reply-title'>isi Biodata Nama Orang Tua :</h3>		</div>
												
                                                    <label for='email'>Nama Orangtua </label>
                                                    <input id='email' name='nama_ortu' type='text' class='form-control' aria-required='true'>
                                              
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input id='email' name='ttl_ortu' type='text' class='form-control' aria-required='true'>
                                              
												
													
                                                    <label for='email'>Jenis Kelamin </label>
													  <select class='form-control select2' name='jk_ortu' >
						<option value='LAKI-LAKI'>LAKI-LAKI</option>
						<option value='PEREMPUAN'>PEREMPUAN</option>
						</select>
                                                                                            
												
													
                                                    <label for='email'>Pekerjaan </label>
                                                    <input id='email' name='pekerjaan_ortu' type='text' class='form-control' aria-required='true'>
                                             
												
															
                                                    <label for='email'>Kewarganegaraan </label>
                                                    <input id='email' name='kwrg_ortu' type='text' class='form-control' aria-required='true'>
                                             
												
																	
                                                    <label for='email'>Alamat Orang Tua</label>
                                                
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat_ortu' cols='45' rows='6' aria-required='true'></textarea>
                                               
											
                                                    <label for='email'>Surat Ini Digunakan Untuk</label>
													  <input id='email' name='ket' type='text' class='form-control' aria-required='true'>
                                              
												</br>
                                                <p class='form-submit'>
                                                    <input name='submit' class='btn btn-primary btn-sm'  type='submit' id='submit' value='Buat Surat'>
                                                </p>
                                          </form>
                                          </div>
                        </div>
                    </div> </div> </div> </div></section>
  
  ";
  
  
}


//proses simpan surat Keterangan Kurang Mampu
elseif($_GET['module']=='proses_surat_kurang_mampu'){
   session_start();
 
   $sisipkan="INSERT INTO srt_k_mampu(nama,
									nik,
                                    ttl,
									jk,
									jk_ortu,
									ttl_ortu,
                                    alamat,
									kwrg,
									kwrg_ortu,
									pekerjaan,
									hp,
                                    nama_ortu,
									alamat_ortu,
                                    pekerjaan_ortu,
									t_tinggal,
                                    ket                                    
                                    )  
                            VALUES('$_POST[nama]',
							       '$_POST[nik]',
								   '$_POST[ttl]',
                                   '$_POST[jk]', 
								   '$_POST[jk_ortu]',
								   '$_POST[ttl_ortu]',
                                   '$_POST[alamat]',
								   '$_POST[kwrg]',
								   '$_POST[kwrg_ortu]',
                                   '$_POST[pekerjaan]',
								   '$_POST[hp]',
                                   '$_POST[nama_ortu]',
                                   '$_POST[alamat_ortu]',
                                   '$_POST[pekerjaan_ortu]',
                                   '$_POST[t_tinggal]',
                                   '$_POST[ket]'
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_mampu order by id_srt_k_mampu DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
 echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_mampu.php?id_srt_d=$hasil[id_srt_k_mampu]'</script>";}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}

}
   



   
 //surat keterangan kurang mampu
elseif($_GET['module']=='surat_keterangan_kematian'){
   
  echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									SURAT KETERANGAN KEMATIAN
                                 </div>
  <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>
    
    1. Silahkan isi form surat permohonan Domisili dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    </br>
    

    Terimakasih</p>
    </div>
 
                      <div class='panel-body'>
 <table class='table table-bordered table-striped'>
 <form method='post' action='proses_surat_keterangan_kematian.html' onclick='' style='margin-left:66px;' class='AdvancedForm'>
                    <thead>
          <p>Nama Penduduk Yang Meninggal</p>
	  <tr><td>Nama Lengkap</td>	<td>  <input type='text' class='form-control' name='nama'  size=20 id='nama'></td></tr>
	   <tr><td>NIK</td>	<td>  <input type='text' class='form-control' name='nik'  size=20 id='nik'></td></tr>
	  <tr><td>Jenis Kelamin</td>	<td> <select class='form-control select2' name='jk' id='jk'>
						<option value='0' >-Pilih Jenis Kelamin-</option>
						<option value='Laki-Laki' >Laki-Laki</option>
						<option value='Perempuan' >Perempuan</option>
						</select></td></tr>
	  <tr><td>Tempat Tanggal Lahir</td>	<td> <input type='text' class='form-control' name='ttl' size=20 id='kosong'></td></tr>
	  <tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' size=10></td></tr></br>
	<tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat' size=30 id='kosong'></td></tr>
	
	
	<tr><td style='background:#999999; padding:6px;'>Keterangan Meninggal</td>
	<tr><td></td>
	 <tr><td>Hari/Tanggal</td>	<td>  <input type='text' class='form-control' name='hari' size=40></td></tr>
	  <tr><td>Pukul</td>		<td> <input type='text' class='form-control' name='pukul' size=40></td></tr>
	  <tr><td>Tempat Meninggal</td>	<td> <input type='text' class='form-control' name='tempat' size=30></td></tr>
	  <tr><td>Sebab Meninggal</td>	<td> <input type='text' class='form-control' name='sebab' size=30></td></tr>
	   <tr><td>Dimakamkan di</td>	<td> <input type='text' class='form-control' name='dimakam' size=30></td></tr>
	  <input type='hidden' class='form-control' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' readonly size=30>
	

	  <tr><td colspan=2><br><br>
		  <button class='btn btn-primary btn-sm' type='submit' class='button'><span> Daftar </span></button>
		  <button class='btn btn-primary btn-sm' type='submit' onclick=self.history.back() class='button'><span>Batal</span></button></td></tr>
          </form>  </table> 
 
	       </div>
                        </div>
                    </div> </div> </div> </div></section>";
  
  
}


//proses simpan surat Keterangan Kurang Mampu
elseif($_GET['module']=='proses_surat_keterangan_kematian'){
   session_start();
 
   $sisipkan="INSERT INTO srt_k_mati(nama,
   nik,
                                    jk,
                                    ttl,
                                    alamat,
                                    hari,
				    pukul,
					hp,
                                    tempat,
				    sebab,
				    dimakam,
                                    waktu                                    
                                    )  
                            VALUES('$_POST[nama]',
							'$_POST[nik]',
                                   '$_POST[jk]', 
                                   '$_POST[ttl]',
                                   '$_POST[alamat]',
                                   '$_POST[hari]',
                                   '$_POST[pukul]',
								   '$_POST[hp]',
                                   '$_POST[tempat]',
                                   '$_POST[sebab]',
                                   '$_POST[dimakam]',
				   '$_POST[waktu]'
                                   )";
     mysql_query("UPDATE data_penduduk_detail  SET 
                                   status         = 'meninggal'
               WHERE nik = '$_POST[nik]'");
			   
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_mati order by id_srt_k_mati DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_mati.php?id_srt_d=$hasil[id_srt_k_mati]'</script>";
}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}

}
 
 //kelakuan baik
elseif($_GET['module']=='kelakuan_baik'){
$sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);
echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									Input Surat Kalakuan Baik
                                 </div>
                                
                      <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>         
						  
    1. Silahkan isi form suarat permohonan dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    Terimakasih</p>	</div>
						        
 <div class='panel-body'>
                                            <form action='proses_k_baik.aspx' method='POST' oonSubmit='return validasi_domisili(this)' id='commentform' class='comment-form'>
                                                
                                                    <label for='author'>Nama <span class='required'>*</span></label>
                                                    <input  name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' type='text' class='form-control' aria-required='true'>
                                                </p>
                                               
                                                    <label for='email'>NIK <span class='required'>*</span></label>
                                                    <input  name='nik' value='$hasil[nik]' readonly id='nik' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir] ' readonly type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Jenis Kelamin </label>
                                                    <input name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' type='text' class='form-control' aria-required='true'>
                                                </p>
												
									
                                                    <label for='email'>Pekerjaan </label>
                                                    <input name='pekerjaan' value='$hasil[jenis_pekerjaan]' type='text' class='form-control' aria-required='true'>
                                                </p>
												<label for='email'>Hp Yang Aktif </label> <input type='text' class='form-control' name='hp' size=10>
												
                                                    <label for='email'>Alamat</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat' cols='45' rows='6' aria-required='true'>Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos]</textarea>
                                                </p>
												
												
                                                    <label for='email'>Agama </label>
                                                   <select class='form-control select2' name='agama' id='status' >
						<option value='ISLAM'>ISLAM</option>
						<option value='KRISTEN'>KRISTEN</option>
						<option value='HINDU'>HINDU</option>
						<option value='BUDHA'>BUDHA</option>
						<option value='YAHUDI'>YAHUDI</option>
						<option value='KRISTEN PROTESTEN'>KRISTEN PROTESTEN</option>
						</select>
                                                </p>
												
												
                                                    <label for='email'>Kewarganegaraan </label>
                                                    <input id='email' name='kwrg' type='text' class='form-control' aria-required='true'>
                                                </p>
												
													
                                                    <label for='email'>Status</label>
														<select class='form-control select2' name='status' id='status' >
						<option value='Nikah'>Nikah</option>
						<option value='Belum Nikah'>Belum Nikah</option>
						<option value='Janda/Duda'>Janda/Duda</option>
						</select>
                                                   
                                                </p>
										
														
                                                    <label for='email'>Surat Ini Digunakan Untuk:</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='ket' cols='45' rows='6' aria-required='true'></textarea>
                                                </p> 
												
                                                    <label for='email'>Karangsari </label>
                                                    <input id='email' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' readonly type='text' class='form-control' aria-required='true'>
                                                </p>
                                                <p class='form-submit'>
                                                    <input name='submit' class='btn btn-primary btn-sm' type='submit' id='submit' value='Buat Surat'>
                                                </p>
                                          </form>
                    	       </div>
                        </div>
                    </div> </div> </div> </div></section>
";   
}
 
 elseif($_GET['module']=='proses_k_baik'){
   session_start();
    $sisipkan="INSERT INTO srt_k_baik(NIK,
                                    nama,
                                    ttl,
                                    jk,
                                    alamat,
									agama,
                                    status,
                                    pekerjaan,
									hp,
                                    kwrg,
                                    ket,
                                    waktu                                    
                                    )  
                            VALUES('$_POST[nik]',
                                   '$_POST[nama]',
                                   '$_POST[ttl]', 
                                   '$_POST[jk]',
                                   '$_POST[alamat]',
                                  '$_POST[agama]',
                                   '$_POST[status]',
                                   '$_POST[pekerjaan]',
								   '$_POST[hp]',
                                   '$_POST[kwrg]',
                                   '$_POST[ket]',
                                   '$_POST[waktu]'
                                   
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_baik order by id_srt_k_baik DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
    echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_kelakuanbaik.php?id_srt_d=$hasil[id_srt_k_baik]'</script>";
}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}
}

 //kelakuan baik
elseif($_GET['module']=='kelakuan_belummenikah'){
$sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);
echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									Input Surat Kalakuan Baik
                                 </div>
                                
                      <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>         
						  
    1. Silahkan isi form suarat permohonan dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    Terimakasih</p>	</div>
						        
 <div class='panel-body'>
     
<table class='table table-bordered table-striped'>
     <form method='post' action='proses_k_nikah.aspx' onclick='' style='margin-left:12px;' onSubmit='return validasi_domisili(this)'>
     
          <tr><td width=90>NIK</td>     <td> <input type='text' class='form-control' name='nik' value='$hasil[nik]' readonly id='nik' size=40></td></tr>
	  <tr><td>Nama Lengkap</td>	<td>  <input type='text' class='form-control' name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' size=40></td></tr>
	  <tr><td>Tempat Tgl Lahir</td>	<td> <input type='text' class='form-control' name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir] ' readonly size=40></td></tr>
	  <tr><td>Jenis Kelamin</td>	<td> <input type='text' class='form-control' name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' size=20></td></tr>
	  <tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat' value='Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos]'  readonly size=30></td></tr>

	  
	  <tr><td>Pekerjaan</td>	  	<td> <input type='text' class='form-control' name='pekerjaan' value='$hasil[jenis_pekerjaan]' size=30></td></tr>
	  
	  <tr><td>Kewarganegaraan</td>	  	<td> <input type='text' class='form-control' name='kwrg' size=10></td></tr></br>
	  
	  
	  <tr><td>Bin/Binti</td>	  	<td> <input type='text' class='form-control' name='bin' size=10></td></tr></br>
	  
	  <tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' size=10></td></tr></br>
	  
	  <tr><td>Surat Ini Digunakan Untuk</td> <td> <textarea style='width: 100%;' name='ket' rows='4' cols='3' style='height:100px; width:300px;'></textarea></br>
	  (* silahkan isi keterangan kegunaan surat
	  </td></tr>
	  
	   <tr><td>Karangsari</td>	  	<td> <input type='text' class='form-control' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' readonly size=30></td></tr></br>
	  
	  <tr><td colspan=2><br><br>
		  <button class='btn btn-primary btn-sm' type='submit'><span> Daftar </span></button>
		  <button class='btn btn-primary btn-sm' type='submit' onclick=self.history.back()><span>Batal</span></button></td></tr>
         </form>  </table>   </div>
                        </div>
                    </div> </div> </div> </div></section>

";   
}
 
 elseif($_GET['module']=='proses_k_nikah'){
   session_start();
    $sisipkan="INSERT INTO srt_k_nikah(NIK,
                                    nama,
                                    ttl,
                                    jk,
                                    alamat,
                                    status,
                                    pekerjaan,
									bin,
									hp,
                                    kwrg,
                                    ket,
                                    waktu                                    
                                    )  
                            VALUES('$_POST[nik]',
                                   '$_POST[nama]',
                                   '$_POST[ttl]', 
                                   '$_POST[jk]',
                                   '$_POST[alamat]',
                                   '$_POST[status]',
                                   '$_POST[pekerjaan]',
								   '$_POST[bin]',
								   '$_POST[hp]',
                                   '$_POST[kwrg]',
                                   '$_POST[ket]',
                                   '$_POST[waktu]'
                                   
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_nikah order by id_srt_d DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
  echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_belumnenikah.php?id_srt_d=$hasil[id_srt_d]'</script>";
  }
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}
}

 //kelakuan surat_usaha
elseif($_GET['module']=='surat_usaha'){
$sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);
echo" <section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
								SURAT KETERANGAN USAHA 
                                 </div>
                                
                      <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>         
						  
    1. Silahkan isi form suarat permohonan dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    Terimakasih</p>	</div>
						        
 <div class='panel-body'>
 

                                            <form action='proses_usaha.aspx' method='POST' oonSubmit='return validasi_domisili(this)' id='commentform' class='comment-form'>
                                                
                                                    <label for='author'>Nama <span class='required'>*</span></label>
                                                    <input  name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' type='text' class='form-control' aria-required='true'>
                                                </p>
                                               
                                                    <label for='email'>NIK <span class='required'>*</span></label>
                                                    <input  name='nik' value='$hasil[nik]' readonly id='nik' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir] ' readonly type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Jenis Kelamin </label>
                                                    <input name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' type='text' class='form-control' aria-required='true'>
                                                </p>
												
									
                                                    <label for='email'>Pekerjaan </label>
                                                    <input name='pekerjaan' value='$hasil[jenis_pekerjaan]' type='text' class='form-control' aria-required='true'>
                                                </p>
												<label for='email'>Hp Yang Aktif </label> <input type='text' class='form-control' name='hp' size=10>
												
                                                    <label for='email'>Alamat</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat' cols='45' rows='6' aria-required='true'>Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos]</textarea>
                                                </p>
														
                                                    <label for='email'>Jenis Usaha </label>
                                                    <input id='email' name='usaha' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tahun Usaha </label>
                                                    <input id='email' name='tahun' type='text' class='form-control' aria-required='true'>
                                                </p>
												
										
											
                                                    <label for='email'>Surat Ini Digunakan Untuk</label>
													  <input id='email' name='ket' type='text' class='form-control' aria-required='true'>
                                                </p>
												<input id='email' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' type='hidden' size='30' aria-required='true'>
                                                <p class='form-submit'>
                                                    <input name='submit' class='btn btn-primary btn-sm' type='submit' id='submit' value='Buat Surat'>
                                                </p>
                                          </form>
                                        </div>
                        </div>
                    </div> </div> </div> </div></section>



";   
}
 
 elseif($_GET['module']=='proses_usaha'){
   session_start();
    $sisipkan="INSERT INTO  srt_k_usaha (NIK,
                                    nama,
                                    ttl,
                                    jk,
                                    alamat,
									usaha,
									tahun,
                                    status,
                                    pekerjaan,
									hp,
                                    kwrg,
                                    ket,
                                    waktu                                    
                                    )  
                            VALUES('$_POST[nik]',
                                   '$_POST[nama]',
                                   '$_POST[ttl]', 
                                   '$_POST[jk]',
                                   '$_POST[alamat]',
                                  '$_POST[usaha]',
								  '$_POST[tahun]',
                                   '$_POST[status]',
                                   '$_POST[pekerjaan]',
								   '$_POST[hp]',
                                   '$_POST[kwrg]',
                                   '$_POST[ket]',
                                   '$_POST[waktu]'
                                   
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_usaha order by id_srt_d DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
      
    echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_usaha.php?id_srt_d=$hasil[id_srt_d]'</script>";
	}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}
}


 //kelakuan surat_kuasa
elseif($_GET['module']=='surat_kuasa'){
$sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);
echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									Input  SURAT   KUASA 
                                 </div>
                                
                      <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>         
						  
    1. Silahkan isi form suarat permohonan dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    Terimakasih</p>	</div>
						        
 <div class='panel-body'>
     
<table><tr><td style='background:#999999; padding:6px;'>Yang Memberi Kuasa :</td> </table>

<table class='table table-bordered table-striped'>
     <form method='post' action='proses_kuasa.aspx' onclick='' style='margin-left:12px;' onSubmit='return validasi_domisili(this)'>
	  
          <tr><td width=90>NIK</td>     <td> <input type='text' class='form-control' name='nik' value='$hasil[nik]' readonly id='nik' size=40></td></tr>
	  <tr><td>Nama Lengkap</td>	<td>  <input type='text' class='form-control' name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' size=40></td></tr>
	  <tr><td>Tempat Tgl Lahir</td>	<td> <input type='text' class='form-control' name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir] ' readonly size=40></td></tr>
	  <tr><td>Jenis Kelamin</td>	<td> <input type='text' class='form-control' name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' size=20></td></tr>
	  <tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat' value='Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos]'  readonly size=30></td></tr>

	  
	  <tr><td>Pekerjaan</td>	  	<td> <input type='text' class='form-control' name='pekerjaan' value='$hasil[jenis_pekerjaan]' size=30></td></tr>
	  
<tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' size=10></td></tr></br>
	  
	 
          </table>
		  
		  <table><tr><td style='background:#999999; padding:6px;'>Yang Diberi Kuasa :</td> </table>
   <table class='table table-bordered table-striped'>
          <tr><td width=90>NIK</td>     <td> <input type='text' class='form-control' name='nik_kuasa' id='nik' size=40></td></tr>
	  <tr><td>Nama Lengkap</td>	<td>  <input type='text' class='form-control' name='nama_kuasa'   id='nama' size=40></td></tr>
	  <tr><td>Tempat Tgl Lahir</td>	<td> <input type='text' class='form-control' name='ttl_kuasa'   size=40></td></tr>
	  <tr><td>Jenis Kelamin</td>	<td> 	<select class='form-control select2' name='jk_kuasa' id='status' readonly>
						<option value='LAKI-LAKI'>LAKI-LAKI</option>
						<option value='PEREMPUAN'>PEREMPUAN</option>
						
						</select></td></tr>
	  <tr><td>Alamat Lengkap</td>	<td> <input type='text' class='form-control' name='alamat_kuasa' size=30></td></tr>

	  
	  <tr><td>Pekerjaan</td>	  	<td> <input type='text' class='form-control' name='pekerjaan_kuasa'  size=30></td></tr>
	  
<tr><td>Surat Ini Digunakan Untuk</td>	  	<td> <input type='text' class='form-control' name='ket'  size=30></td></tr>
	  
	   <tr><td>Karangsari</td>	  	<td> <input type='text' class='form-control' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' readonly size=30></td></tr></br>
	  
	  <tr><td colspan=2><br><br>
		  <button class='btn btn-primary btn-sm' type='submit'><span> Daftar </span></button>
		  <button class='btn btn-primary btn-sm' type='submit' onclick=self.history.back()><span>Batal</span></button></td></tr>
          	  
		  
		  </form> </table> </div>
                        </div>
                    </div> </div> </div> </div></section>

";   
}
 
 elseif($_GET['module']=='proses_kuasa'){
   session_start();
    $sisipkan="INSERT INTO srt_k_kuasa(NIK,
                                    nama,
                                    ttl,
                                    jk,
                                    alamat,
                                    status,
                                    pekerjaan,
									hp,
									nik_kuasa,
                                    nama_kuasa,
                                    ttl_kuasa,
                                    jk_kuasa,
                                    alamat_kuasa, 
                                    pekerjaan_kuasa,
                                    kwrg,
                                    ket,
                                    waktu                                    
                                    )  
                            VALUES('$_POST[nik]',
                                   '$_POST[nama]',
                                   '$_POST[ttl]', 
                                   '$_POST[jk]',
                                   '$_POST[alamat]',
                                  
                                   '$_POST[status]',
                                   '$_POST[pekerjaan]',
								   '$_POST[hp]',
								   '$_POST[nik_kuasa]',
                                   '$_POST[nama_kuasa]',
                                   '$_POST[ttl_kuasa]', 
                                   '$_POST[jk_kuasa]',
                                   '$_POST[alamat_kuasa]',
								   '$_POST[pekerjaan_kuasa]',
                                   '$_POST[kwrg]',
                                   '$_POST[ket]',
                                   '$_POST[waktu]'
                                   
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_kuasa order by id_srt_d DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
      
         echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_kuasa.php?id_srt_d=$hasil[id_srt_d]'</script>";
}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}
}

 //kelakuan surat_izin
elseif($_GET['module']=='surat_izin'){
$sql=mysql_query("SELECT * FROM data_penduduk_detail,data_penduduk WHERE data_penduduk_detail.id_data_penduduk=data_penduduk.id_data_penduduk AND nik='$_SESSION[nik]'");
  $hasil=mysql_fetch_array($sql);
echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									Input  Surat izin  Pertunjukan/Keramaian
                                 </div>
                                
                      <div style='background:#e0e0e0; padding:5px; margin-bottom:16px;'
    <p>(* Keterangan</br></br>         
						  
    1. Silahkan isi form suarat permohonan dengan benar</br>
    2. Catat dan lihat ID suarat permohonan yang telah anda setujui </br>
    3. ID digunakan untuk pengecekan surat permohonan bahwa telah di proses atau belum</br>
    Terimakasih</p>	</div>
						        
 <div class='panel-body'>	

                 <form action='proses_izin.aspx' method='POST' oonSubmit='return validasi_domisili(this)' id='commentform' class='comment-form'>
                                                
                                                    <label for='author'>Nama <span class='required'>*</span></label>
                                                    <input  name='nama'  value='$hasil[nama_lengkap]' readonly id='nama' type='text' class='form-control' aria-required='true'>
                                                </p>
                                               
                                                    <label for='email'>NIK <span class='required'>*</span></label>
                                                    <input  name='nik' value='$hasil[nik]' readonly id='nik' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Tempat Tanggal Lahir </label>
                                                    <input name='ttl'  value='$hasil[tempat_lahir],$hasil[tanggal_lahir] ' readonly type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Jenis Kelamin </label>
                                                    <input name='jk' value='"; if($hasil[jenis_kelamin]=='PEREMPUAN'){
					
echo"PEREMPUAN";
					
} 
					elseif($hasil[jenis_kelamin]=='LAKI-LAKI')
					
					{
						
						echo"LAKI-LAKI";
					
} echo"
				' readonly id='jk' type='text' class='form-control' aria-required='true'>
                                                </p>
												
									
                                                    <label for='email'>Pekerjaan </label>
                                                    <input name='pekerjaan' value='$hasil[jenis_pekerjaan]' type='text' class='form-control' aria-required='true'>
                                                </p>
												<label for='email'> No Hp Aktif </label>
                                                    <input name='hp'  type='text' class='form-control' aria-required='true'>
												
                                                    <label for='email'>Alamat</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='alamat' cols='45' rows='6' aria-required='true'>Pekon $hasil[alamat] RT/RW $hasil[rt_rw] Kecamatan $hasil[kecamatan] Kabupaten $hasil[kab_kota] $hasil[propinsi] Kode Pos $hasil[kode_pos]</textarea>
                                                </p>
												
												
                                                    <label for='email'>Hari/Tanggal </label>
                                                    <input id='email' name='hari' type='text' class='form-control' aria-required='true'>
                                                </p>
												
												
                                                    <label for='email'>Waktu </label>
                                                    <input id='email' name='pukul' type='text' class='form-control' aria-required='true'>
                                                </p>
												
													
                                                    <label for='email'>Tempat </label>
                                                    <input id='email' name='tempat' type='text' class='form-control' aria-required='true'>
                                                </p>
												
													
                                                    <label for='email'>Hiburan </label>
                                                    <input id='email' name='hiburan' type='text' class='form-control' aria-required='true'>
                                                </p>
												
															
                                                    <label for='email'>Acara </label>
                                                    <input id='email' name='acara' type='text' class='form-control' aria-required='true'>
                                                </p>
												
																
                                                    <label for='email'>Pimpinan </label>
                                                    <input id='email' name='pimpinan' type='text' class='form-control' aria-required='true'>
                                                </p>
												
														
                                                    <label for='email'>Keterangan</label>
                                                </p>
                                                
                                               <textarea style='width: 100%;' id='comment' name='ket' cols='45' rows='6' aria-required='true'></textarea>
                                                </p> 
												<input id='email' name='waktu' value='$hari_ini, $tgl_skrg-$bulan-$thn_sekarang' type='hidden' size='30' aria-required='true'>
                                                <p class='form-submit'>
                                                    <input name='submit' class='btn btn-primary btn-sm' type='submit' id='submit' value='Buat Surat'>
                                                </p>
                                          </form>
                  </div>
                        </div>
                    </div> </div> </div> </div></section>
";   
}
 
 elseif($_GET['module']=='proses_izin'){
   session_start();
    $sisipkan="INSERT INTO srt_k_izin(NIK,
                                    nama,
                                    ttl,
                                    jk,
                                    alamat,
                                    acara,
                                    pekerjaan,
									hp,
                                    hari,
                                    ket,
                                    pukul,
                                    tempat,
                                    hiburan,
                                    pimpinan,
									waktu
                                    )  
                            VALUES('$_POST[nik]',
                                   '$_POST[nama]',
                                   '$_POST[ttl]', 
                                   '$_POST[jk]',
                                   '$_POST[alamat]',
                                   '$_POST[acara]',
                                   '$_POST[pekerjaan]',
								   '$_POST[hp]',
                                   '$_POST[hari]',
                                   '$_POST[ket]',
                                   '$_POST[pukul]',
                                    '$_POST[tempat]',
                                   '$_POST[hiburan]',
                                   '$_POST[pimpinan]',
								   '$_POST[waktu]'
                                   )";
                                  
$cek= mysql_query ($sisipkan);
     $con=mysql_query("SELECT * FROM srt_k_izin order by id_srt_d DESC");
      $hasil=mysql_fetch_array($con);
    if ($cek) {
 echo "<script>alert(' terima kasih data surat permohonan anda sudah terkirim'); window.location = 'cetak/cetak_k_izinkemaian.php?id_srt_d=$hasil[id_srt_d]'</script>";
	
	}
else{

echo "<script>window.alert('Maaf Data Tidak Berhasil Di Kirim !');
        window.location=('javascript:history.go(-1)')</script>";

}
}

//kelakuan surat_izin
elseif($_GET['module']=='statussurat'){
$sql=mysql_query("SELECT * FROM status_surat,data_penduduk_detail WHERE data_penduduk_detail.nik=status_surat.nik AND nik='$_SESSION[nik]'");

echo"<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									Cek status Surat
                                 </div>			        
 <div class='panel-body'>	
<div class='table-responsive'>
	 <table id='example1' class='table table-bordered table-striped'>
                    <thead>
	<tr>
		<th>No</th>
  
	<th>nik</th>
    <th>Nama Lenkap</th>
	<th>keterangan</th>
	<th>Nama Surat</th>

	</tr></thead>
                    <tbody>";
  $no = $posisi+1;
      while($r=mysql_fetch_array($sql)){
	echo "<tr> <td width=50><center>$g</center></td>
  
  <td>$r[nik]</td>
  <td width=80>$r[nama_lengkap]</td>
  <td width=50>$r[keter]</td>
  <td width=50>$r[nama_surat]</td></tr>";
		$no++;
}
echo "</tbody></table>  </div>
     
                  </div>
                        </div>
                    </div> </div> </div> </div></section>
";   
}