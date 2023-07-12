<style type="text/css">
 .surat:hover{
  background-color: #265180;

 }
</style>

<?php

 echo "<div class='main_container container_16 clearfix'>
				<div class='flat_area grid_16'>
					
					<h3><p>Hai <b>$_SESSION[namalengkap]</b></h3></br>selamat datang di halaman Administrator.<br> 
					Silahkan Kelola Surat Permohonan dari penduduk  </p>
				</div>				
			</div>";
    echo "<div class='main_container container_16 clearfix'>
				<div class='flat_area grid_16'><center>
					<table>
		<tr>
		  <td width=120 align=center class=surat><a href=media.php?module=domisili><img src=images/surat.jpg border=none class='img' width=100></a></td>
		  <td width=120 align=center class=surat><a href=media.php?module=ket_mampu><img src=images/surat.jpg border=none class='img' width=100></a></td>
		  <td width=120 align=center class=surat><a href=media.php?module=k_mati><img src=images/surat.jpg border=none class='img' width=100></a></td>
		  <td width=120 align=center class=surat><a href=media.php?module=lajang><img src=images/surat.jpg border=none class='img' width=100></a></td>
		  <td width=120 align=center class=surat><a href=media.php?module=izinkeramaian><img src=images/surat.jpg border=none class='img' width=100></a></td>
		    </tr>
		<tr>
		  <th width=120><b>Surat Permohonan Domisili</b></th>
		  <th width=120><b>Surat Permohonan Kurang Mampu</b></center></th>
		  <th width=120><b>Surat Keterangan Kematian</b></th>
		  <th width=120><b>Surat Keterangan Belum Menikah</b></th>
		<th width=120><b>Surat Izin Keramaian</b></th>
			  	  
		</tr>
		
		
		<tr>
		  	  <td width=120 align=center class=surat><a href=media.php?module=kalakuanbaik><img src=images/surat.jpg border=none class='img' width=100></a></td>
		  <td width=120 align=center class=surat><a href=media.php?module=keteranganusaha><img src=images/surat.jpg border=none class='img' width=100></a></td>
		  <td width=120 align=center class=surat><a href=media.php?module=kuasa><img src=images/surat.jpg border=none class='img' width=100></a></td>
		    </tr>
		<tr>
		  			  	  <th width=120><b>Surat Keterangan Berkelakuan Baik</b></th>
				  	  <th width=120><b>Surat Keterangan Usaha</b></th>
					  	  <th width=120><b>Surat Kuasa</b></th>

		</tr>
    </table></center>";
?>
