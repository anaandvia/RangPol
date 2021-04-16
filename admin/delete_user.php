<?php
// include database connection file
include 'koneksi.php';
$id_peminjam = $_POST['datadel'];
$sql = "DELETE FROM peminjam WHERE id_peminjam ='$id_peminjam'";
mysqli_query($koneksi,$sql );

header("Location:user.php");

?>