<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari halaman ini'); window.location = '../index.php'</script>";
?>