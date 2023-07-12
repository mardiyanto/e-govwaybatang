<?php   
  if ($_GET['module']=='penduduk'){
  echo"<div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
          <div class='contact_area'>
	<h2 class='title'>Data Penduduk</h2>
	<div class='maincont'>                
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
						<th>No KK</th>
                        <th>Nama Kepala Keluarga</th>
					
                       <th>Dusun</th>
                        <th>RT/RW</th>
                        <th>detail</th>
                      </tr>
                    </thead>
                    <tbody>";
					$sql   = "SELECT * FROM data_penduduk ORDER BY id_data_penduduk DESC";		 
					  $hasil = mysql_query($sql);
					  $no = 1;
					  while($r=mysql_fetch_array($hasil)){
	echo "
                      <tr>
                        <td>$no</td>
						<td>181002010xxxxxxx</td>
                         <td>$r[kepala_keluarga]</td>
						 
			                <td>$r[dusun]</td>
			                <td>$r[rt_rw]</td>
			                <td><a class='btn btn-success btn-xs' href='penduduk.php?module=detailpp&idp=$r[no_kk]' class='with-tip'>detail</a></td>
                      </tr>";
					 
					    $no++;
    } echo"
   
               
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
						<th>No KK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat</th>
                        <th>RT/RW</th>
                        <th>detail</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
</div></div></div>		
    ";  }


// Modul detail agenda
elseif ($_GET['module']=='detailpp'){
	$row = mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk where id_data_penduduk='".$_GET[idp]."'"));
						echo "<div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
          <div class='contact_area'>
	<h2 class='title'>Detail Data Penduduk</h2>
	<div class='maincont'>  
						<div class='col-md-6'>
								<table class=table>
								   <tr><td style='font-weight:bold' width='120px'>No KK</td> <td> : 181002010xxxxxxx</td></tr> 
								   <tr><td style='font-weight:bold'>Kepala Keluarga</td> 	<td> : $row[kepala_keluarga]</td></tr> 
								   <tr><td style='font-weight:bold'>Alamat</td> 				<td> : $row[alamat]</td></tr> 
								   <tr><td style='font-weight:bold'>RT/RW</td> 				<td> : $row[rt_rw]</td></tr> 
								   <tr><td style='font-weight:bold'>Kode Pos</td> 			<td> : $row[kode_pos]</td></tr> 
								</table>
							  </div>

							  <div class='col-md-6'>
							  	<table class=table>
								   <tr><td style='font-weight:bold' width='120px'>Desa/Kelurahan</td> <td> : $row[desa_kelurahan]</td></tr> 
								   <tr><td style='font-weight:bold' width='120px'>Dusun</td> <td> : $row[dusun]</td></tr> 
								   <tr><td style='font-weight:bold'>Kecamatan</td> 			<td> : $row[kecamatan]</td></tr> 
								   <tr><td style='font-weight:bold'>Kab/Kota</td> 			<td> : $row[kab_kota]</td></tr> 
								   <tr><td style='font-weight:bold'>Propinsi</td> 			<td> : $row[propinsi]</td></tr> 
								</table> 
							  </div>
							  <div style='clear:both'></div><br>

							  	<table id='example1' class='table table-bordered table-striped'>
							      <thead> 
							          <tr bgcolor='#cecece'><th width='20px'>No</th>
							          	  <th>Nama Lengkap</th>
							          	  <th>NIK</th>
							          	  <th>Jns. Kelamin</th>
							          	  <th>Tmpt. Lahir</th>
							          	  <th>Tgl. Lahir</th>
							          	  <th>Agama</th>
							          	  <th>Pendidikan</th>
							          	  <th>Pekerjaan</th>
							          </tr>
								  </thead>
								  <tbody>";
								  $tampil=mysql_query("SELECT * FROM data_penduduk_detail where id_data_penduduk='".$_GET[idp]."'");
								  $no=1;
								  while ($r=mysql_fetch_array($tampil)){
								  	echo "<tr>
								  			 <td>$no</td>
								  			 <td>$r[nama_lengkap]</td>
								  			 <td>181002010xxxxxxx</td>
								  			 <td>$r[jenis_kelamin]</td>
								  			 <td>$r[tempat_lahir]</td>
								  			 <td>$r[tanggal_lahir]</td>
								  			 <td>$r[agama]</td>
								  			 <td>$r[pendidikan]</td>
								  			 <td>$r[jenis_pekerjaan]</td>
								  		</tr>";
								  		$no++;
								  }
								  echo "</tbody>
						  		</table></div></div></div>
              ";
}


	
	?>