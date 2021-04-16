<?php
include 'koneksi.php';
$id = $_POST['id'];
$sql = "SELECT * FROM peminjam where id_peminjam='$id'";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($query);

$row['id_peminjam']=$data['id_peminjam'];
$row['nim']=$data['nim'];
$row['nama']=$data['nama'];
$row['email']=$data['email'];
$row['no_tlp']=$data['no_tlp'];

echo json_encode($row);

?>