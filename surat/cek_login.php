<?php
include "../config/koneksi1.php";
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

$nik = anti_injection($_POST['nik']);


// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($nik)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
$login=mysql_query("SELECT * FROM data_penduduk_detail WHERE nik='$nik'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";

  $_SESSION[id_data_penduduk_detail]  = $r[id_data_penduduk_detail];
  $_SESSION[nik]  = $r[nik];
    $_SESSION[nama_lengkap]  = $r[nama_lengkap];
    $_SESSION[jenis_kelamin]  = $r[jenis_kelamin];
	$_SESSION[agama]  = $r[agama];
    $_SESSION[pendidikan]  =$r[pendidikan];
    $_SESSION[jenis_pekerjaan]  =$r[jenis_pekerjaan];
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
  mysql_query("INSERT INTO login_penduduk (id_session,nik,tgl,jam) VALUES('$sid_baru','$nik','$hari, $tanggal-$bulan-$tahun',' $jam')");
  header('location:media.php?module=home');
}
else{
  echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
}
?>
