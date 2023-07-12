<html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="csslogin/reset.css">
	<link rel="stylesheet" href="csslogin/animate.css">
	<link rel="stylesheet" href="csslogin/styles.css">
	<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>
	
</head>

	<!-- Main HTML -->
	
<body OnLoad="document.login.username.focus();">
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
		
		<label for="name">Username:</label>
		
		<input type="name" name="username" >
		
		<label for="username">Password:</label>
		<input type="password" name="password">
		
		<div id="lower">
		
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>
		
		<input type="submit" value="Login">
		
		</div>
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
	
</body>

</html>
	
	
	
	
	
		
	
	