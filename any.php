<?php
	error_reporting(0);
	session_start();
	
    $level = $_SESSION['level'];
	if ($level=="peminjam") {
		header ('location:user/dashboard.php');
	}
	else if ($level=="admin") {
		header ('location:admin/index.php');
	}else {
		echo '<script language="javascript">alert("Silahkan Login Terlebih Dahulu!"); document.location="admin/login.php";</script>';
	}
?>