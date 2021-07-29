<?php
    include "koneksi.php";
	if(!empty($_POST["forgot-password"])){
		$condition = "";
		if(!empty($_POST["nim"])) 
			$condition = " member_name = '" . $_POST["nim"] . "'";
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "SELECT * FROM peminjam " . $condition;
		$result = mysqli_query($koneksi,$sql);
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {
			require_once("recovery_mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>