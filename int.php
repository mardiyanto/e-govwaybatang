<?php
// Bagian Home
if ($_GET[module]=='home'){
 echo"<div class='content_top'>
      <div class='row'>
	  <div class='col-lg-12 col-md-12 col-sm12'>
	  <div class='single_iteam'><img src='45.jpg' alt=''></div>
	  </div>
        <div class='col-lg-6 col-md-6 col-sm6'>
          <div class='latest_slider'>
            <div class='slick_slider'>";
			 $populer=mysql_query("SELECT * FROM berita ORDER BY dibaca DESC LIMIT 8");
                  while($t=mysql_fetch_array($populer)){
			echo"
              <div class='single_iteam'><img src='foto_berita/$t[gambar]' alt=''>
                <h2><a class='slider_tittle' href='xxx.php?module=detailberita&id=$t[id_berita]'>$t[judul]</a></h2>
              </div>";
				  }
				  echo"
            </div>
          </div>
        </div>
        <div class='col-lg-6 col-md-6 col-sm6'>
          <div class='content_top_right'>
            <ul class='featured_nav wow fadeInDown'>";
			$terkini=mysql_query("select * from berita ORDER by id_berita DESC LIMIT 4");	 
	        while($t=mysql_fetch_array($terkini)){
			echo"<li><img src='foto_berita/$t[gambar]' alt=''>
                <div class='title_caption'><a href='xxx.php?module=detailberita&id=$t[id_berita]'>$t[judul]</a></div>
              </li>";
			  } 
              echo"
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class='content_middle'>
      <div class='col-lg-3 col-md-3 col-sm-3'>
        <div class='content_middle_leftbar'>
          <div class='single_category wow fadeInDown'>
            <h2> <span class='bold_line'><span></span></span> <span class='solid_line'></span> <a href='xxx.php?module=galeri' class='title_text'>Galeri Foto</a> </h2>
            <ul class='catg1_nav'>
			";
	$con=mysql_query("SELECT * FROM gallery order by RAND() LIMIT 3");
	while($t=mysql_fetch_array($con)){
		echo"
              <li>
                <div class='catgimg_container'> <a href='xxx.php?module=galeri' class='catg1_img'><img alt='' src='img_galeri/$t[gbr_gallery]'></a></div> 
	</li>";}
	echo"
            </ul>
          </div>
        </div>
      </div>
      <div class='col-lg-6 col-md-6 col-sm-6'>
        <div class='content_middle_middle'>
          <div class='slick_slider2'>";
		  		$con=mysql_query("SELECT * FROM berita order by RAND() LIMIT 8");
	while($t=mysql_fetch_array($con)){
		$isi_berita6 = strip_tags($t['isi_berita']); 
                $isi6 = substr($isi_berita6,0,200); 
                $isi6 = substr($isi_berita6,0,strrpos($isi6," "));
		echo"
          <div class='single_featured_slide'> <a href='xxx.php?module=detailberita&id=$t[id_berita]'><img src='foto_berita/$t[gambar]' alt=''></a>
              <h2><a href='xxx.php?module=detailberita&id=$t[id_berita]'>$t[judul]</a></h2>
              <p>$isi6...</p>
	</div>";}echo"
            
          </div>
        </div>
      </div>
      <div class='col-lg-3 col-md-3 col-sm-3'>
        <div class='content_middle_rightbar'>
          <div class='single_category wow fadeInDown'>
            <h2> <span class='bold_line'><span></span></span> <span class='solid_line'></span> <a href='xxx.php?module=galeri' class='title_text'>Galeri Foto</a> </h2>
            <ul class='catg1_nav'>
              ";
	$con=mysql_query("SELECT * FROM gallery order by RAND() LIMIT 3");
	while($t=mysql_fetch_array($con)){
		echo"
              <li>
                <div class='catgimg_container'> <a href='xxx.php?module=galeri' class='catg1_img'><img alt='' src='img_galeri/$t[gbr_gallery]'></a></div> 
	</li>";}
	echo"
              
            </ul>
          </div>
        </div>
      </div>
    </div>
 ";
}

// Modul halaman statis
elseif ($_GET['module']=='halamanstatis'){       
	$detail=mysql_query("SELECT * FROM halamanstatis 
                      WHERE id_halaman='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
		echo "<div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
          <div class='contact_area'> <div class='post' id='post-55'>
		<h2 class='title'><a href='#' title='$d[judul]' rel='bookmark'>$d[judul]</a></h2>
		  <div class='entry clearfix'>
	";
 		// Apabila ada gambar dalam berita, tampilkan
    if ($d['gambar']!=''){
			echo "<a href='#'><img width='200' height='133' src='foto_banner/$d[gambar]' class='alignleft featured_image wp-post-image' alt='$t[judul]' /></a>";
		}
    echo "<p align='justify'>$d[isi_halaman]</p></div>
	</div></div></div></div></div>";         
}

elseif ($_GET['module']=='galeri'){
echo"
    <div class='content_middle'>
      <div class='col-lg-3 col-md-3 col-sm-3'>
        <div class='content_middle_leftbar'>
          <div class='single_category wow fadeInDown'>
            <h2> <span class='bold_line'><span></span></span> <span class='solid_line'></span> <a href='#' class='title_text'>Galeri Foto</a> </h2>
            <ul class='catg1_nav'>
			";
	$con=mysql_query("SELECT * FROM gallery order by RAND() LIMIT 3");
	while($t=mysql_fetch_array($con)){
		echo"
              <li>
                <div class='catgimg_container'> <a href='#' class='catg1_img'><img alt='' src='img_galeri/$t[gbr_gallery]'></a></div> 
	</li>";}
	echo"
            </ul>
          </div>
        </div>
      </div>
      <div class='col-lg-6 col-md-6 col-sm-6'>
        <div class='content_middle_middle'>
          <ul class='featured_nav wow fadeInDown'>";
			$terkini=mysql_query("select * from gallery ORDER by id_gallery DESC LIMIT 6");	 
	        while($t=mysql_fetch_array($terkini)){
			echo"<li><img src='img_galeri/$t[gbr_gallery]' alt=''>
                <div class='title_caption'><a href='#'>$t[judul]</a></div>
              </li>";
			  } 
              echo"
            </ul>
        </div>
      </div>
      <div class='col-lg-3 col-md-3 col-sm-3'>
        <div class='content_middle_rightbar'>
          <div class='single_category wow fadeInDown'>
            <h2> <span class='bold_line'><span></span></span> <span class='solid_line'></span> <a href='#' class='title_text'>Galeri Foto</a> </h2>
            <ul class='catg1_nav'>
              ";
	$con=mysql_query("SELECT * FROM gallery order by RAND() LIMIT 3");
	while($t=mysql_fetch_array($con)){
		echo"
              <li>
                <div class='catgimg_container'> <a href='#' class='catg1_img'><img alt='' src='img_galeri/$t[gbr_gallery]'></a></div> 
	</li>";}
	echo"
              
            </ul>
          </div>
        </div>
      </div>
    </div>
 ";
}

// Modul detail berita
elseif ($_GET['module']=='detailberita'){
	$detail=mysql_query("SELECT * FROM berita,users
                      WHERE users.username=berita.username 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d['tanggal']);
	$baca = $d['dibaca']+1;
  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE berita SET dibaca=$d[dibaca]+1 
              WHERE id_berita='$_GET[id]'"); 	
	echo" <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
          <div class='contact_area'>
            <h2 class='post_titile'>$d[judul]</h2>
            <div class='single_page_content'>
              <div class='post_commentbox'> 
			  <a href='#'><i class='fa fa-user'></i>by $d[nama_lengkap]</a> <span>
			  <i class='fa fa-calendar'></i>$d[hari], $tgl - $d[jam] WIB</span> <a href='#'>
			  <i class='fa fa-tags'></i>$d[dibaca] di baca</a> </div>
			  <br>
<blockquote> <img  src='foto_berita/$d[gambar]' class='alignleft featured_image wp-post-image' alt='#' />
<p align='justify'>$d[isi_berita]</p></blockquote>
            </div>
          </div>
		 </div>
		 </div>
";
}

// Modul semua berita
elseif ($_GET['module']=='semuaberita'){
	echo"<div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
          <div class='contact_area'>";
  $p      = new Paging2;
  $batas  = 7;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysql_query("SELECT * FROM berita ORDER by id_berita DESC LIMIT $posisi,$batas");
  while($t=mysql_fetch_array($sql)){
		$tgl = tgl_indo($t['tanggal']);
echo "
<div class='post' id='post-55'>  
        <div class='postmeta-primary'>
            <span class='meta_date'>$t[hari], $tgl - $t[jam] WIB</span>
           &nbsp; <span class='meta_categories'><a href='#' title='$t[nama_lengkap]' rel='category'>by Administrator</a></span>
           &nbsp; <span class='meta_comments'><a href='#' title='$t[jml] Komentar'>$t[jml] Komentar </a></span> 
        </div>
		<h2 class='title'><a href=xxx.php?module=detailberita&id=$t[id_berita]>$t[judul]</a></h2>
	<div class='entry clearfix'>
";

 		// Apabila ada gambar dalam berita, tampilkan
    if ($t['gambar']!=''){
			echo "<img src='foto_berita/small_$t[gambar]' class='alignleft featured_image wp-post-image' width='150' height='110'>";
		}
    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,660); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

    echo "<p align='justify'>$isi...</p>
	<div class='readmore'>
            <a href='xxx.php?module=detailberita&id=$t[id_berita]' title='' rel='bookmark'>Read More</a>
        </div>
		</div>
	</div>";
	}
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halberita'], $jmlhalaman);
  echo "$linkHalaman <br /><br />
  </div></div></div>";
}

// Modul hubungi kami
elseif ($_GET['module']=='hubungikami'){
  echo " <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
<div class='tabbable'>
						<ul class='nav nav-tabs'>
							<li class='active'><a href='#one' data-toggle='tab'><i class='icon-rocket'></i>Kontak Penting</a></li>
							<li><a href='#two' data-toggle='tab'>Isi Form Hubungi</a></li>
							<li><a href='#three' data-toggle='tab'>Peta Kami</a></li>
						</ul>
						<div class='tab-content'>
							<div class='tab-pane active' id='one'>
								<div class='contact_area'>
	<h2 class='title'>Telpone Penting</h2>
	<table border='1' cellspacing='0' cellpadding='0' width='392'>
  <tr>
    <td width='216' valign='top'><p align='center'><strong>Nama    Instansi</strong> </p></td>
    <td width='204' valign='top'><p align='center'><strong>Telepon</strong> </p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Polres Way Batang</p></td>
    <td width='204' valign='top'><p align='center'>486841</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Polsek Way Batang</p></td>
    <td width='204' valign='top'><p align='center'>0721-94309</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>RS. Abdoel Moeloek</p></td>
    <td width='204' valign='top'><p align='center'>0721-702455</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Pedada</p></td>
    <td width='204' valign='top'><p align='center'>0821-77144501</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Bunut</p></td>
    <td width='204' valign='top'><p align='center'>0852-6999-3434</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Padang Cermin</p></td>
    <td width='204' valign='top'><p align='center'>0823-7230-9197</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Hanura</p></td>
    <td width='204' valign='top'><p align='center'>0813-7901-6201&nbsp;</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Way Batang&nbsp;</p></td>
    <td width='204' valign='top'><p align='center'>0813-2027-6262&nbsp;</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Bernung</p></td>
    <td width='204' valign='top'><p align='center'>0812-2249-135&nbsp;</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Kalirejo</p></td>
    <td width='204' valign='top'><p align='center'>0852-6957-6736</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Roworejo</p></td>
    <td width='204' valign='top'><p align='center'>0812-7275-7455</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Kotadalam</p></td>
    <td width='204' valign='top'><p align='center'>0823-7538-1411</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Kedondong</p></td>
    <td width='204' valign='top'><p align='center'>0852-7096-6776</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Tegineneng</p></td>
    <td width='204' valign='top'><p align='center'>0812-7341-1569</p></td>
  </tr>
  <tr>
    <td width='216' valign='top'><p>Puskesmas Trimulyo</p></td>
    <td width='204' valign='top'><p align='center'>0812-7956-156</p></td>
  </tr>
</table></div>
							</div>
							<div class='tab-pane' id='two'>
								<div class='contact_area'>
	<h2 class='title'>Hubungi Kami</h2>
	<div class='maincont'>";
  echo "
        <table class='table table-bordered table-striped'>
        <form action=xxx.php?module=hubungiaksi class='contact_form' method=POST>
        <tr><td>Nama</td><td>  <input type=text class='form-control' name=nama size=40></td></tr>
        <tr><td>Email</td><td>  <input type=text class='form-control' name=email size=40></td></tr>
        <tr><td>Subjek</td><td>  <input type=text class='form-control' name=subjek size=55></td></tr>
        <tr><td valign=top>Pesan</td><td valign=top> <textarea name=pesan class='form-control'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td>(Masukkan 6 kode diatas)<br /><input type=text class='form-control' name=kode size=6 maxlength=6><br /></td></tr>
        </td><td colspan=2><input type=submit name=submit class='btn btn-success' value=Kirim Pesan></td></tr>
        </form></table><br />";
echo "</div>
		<ol class='commentlist'>";
    $tampil=mysql_query("SELECT * FROM hubungi  WHERE aktif='y' ORDER BY id_hubungi DESC");
    while ($r=mysql_fetch_array($tampil)){
		$komen=wordwrap($r['pesan'], 150, "<br />\n", 1);
      $tgl=tgl_indo($r[tanggal]);
      echo "<li class='comment even thread-even depth-1 parent' id='comment-5'>
				<div id='div-comment-5' class='comment-body'>
				<div class='comment-author vcard'>
			<img alt='' src='1.png' class='avatar avatar-32 photo' height='32' width='32' />
			<cite class='fn'><a href='' rel='external nofollow' class='url'>$r[nama]</a></cite> <span class='says'><em class='comment-awaiting-moderation'>$tgl | Berkata :<p>$komen</p> </em></span>		
			</div>	
		</div><p></p>";
		if($r[balas]!=''){
		echo"
		<ul class='comment even thread-even depth-1 parent' id='comment-5'>
				<div id='div-comment-5' class='comment-body'>
				<div class='comment-author vcard'>
			<img alt='' src='1.png' class='avatar avatar-32 photo' height='32' width='32' />
			<cite class='fn'><a href='' rel='external nofollow' class='url'>$r[admin]</a></cite> <span class='says'><em class='comment-awaiting-moderation'>$r[tgl] | Berkata :<p>$r[balas]</p> </em></span>		</div>	
		</div>";}echo"<p></p>	
</ul>
</li>";}echo"
	</ol></div>
							</div>
							<div class='tab-pane' id='three'>
								<div class='contact_area'>
<div class='contact_area'>
	<h2 class='title'>Peta Kami</h2>
	<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3220.460545383015!2d103.65445185345192!3d-4.9785675074317535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e47f9cdcd6e6a6d%3A0xa32baa355e6340dc!2sBalai%20Pekon%20Way%20Batang!5e1!3m2!1sid!2sid!4v1689131134292!5m2!1sid!2sid' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
	</div>
							</div>
						</div>
					</div>		
          </div></div>

";		
}

// Modul hubungi aksi
elseif ($_GET['module']=='hubungiaksi'){
  echo "<div class='binner'>
	<div class='base'><b>Hubungi Kami</b></div><div class='maincont'>";
$nama=trim($_POST['nama']);
$email=trim($_POST['email']);
$subjek=trim($_POST['subjek']);
$pesan=trim($_POST['pesan']);

if (!ereg("[a-z|A-Z]","$_POST[nama]")){
  echo "<div class='entry'>Nama harus Huruf Bro....!! kamu itu gak boleh ngasal ngisinya..!!<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
echo "<div class='clr'></div></div>
	<div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div>
</div>";		  
}
elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email'])){
  echo "isi email dengan benar bro<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
echo "<div class='clr'></div></div>
	<div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div>
</div>";		  
}
elseif (empty($subjek)){
  echo "Anda belum mengisikan SUBJEK<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
echo "<div class='clr'></div></div>
	<div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div>
</div>";
}
elseif (empty($pesan)){
  echo "Anda belum mengisikan PESAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
echo "<div class='clr'></div></div>
	<div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div>
</div>";
}
else{
	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<p align=center><b>Terimakasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
  echo "<div class='clr'></div></div><div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div></div>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		echo "<div class='clr'></div></div><div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div></div>";
		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	echo "<div class='clr'></div></div><div class='bmore'><img class='lbmore' src='images/bmoreleft.png' /></div></div>";
	}
}
}

?>

