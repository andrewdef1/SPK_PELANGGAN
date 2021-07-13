<?php
	session_start();
	include "../koneksi.php";

	$username = $_POST['user_admin'];
	$password = $_POST['password_admin'];

		$query = mysqli_query($koneksi,"select * from admin where user_admin='$username' and password_admin='$password'");
		$cek=mysqli_num_rows($query);

		if($cek){
			$_SESSION['admin'] = $username;
			?><script language="JavaScript">alert('Login Berhasil  !'); 
			document.location='index.php'</script><?php
		}else {
			echo mysqli_error();
			?><script language="JavaScript">alert('Login Gagal  !'); 
			document.location='index.php'</script><?php
		}

?>