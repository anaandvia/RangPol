<?php
session_start();

$user = $_SESSION['username'];
if(!isset($_SESSION['level'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="login.php";</script>';
}
?>