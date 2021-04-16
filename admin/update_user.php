<?php
// include database connection file
include 'koneksi.php';
$id_peminjam = $_POST['id_peminjam'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_tlp = $_POST['no_tlp'];
$result = mysqli_query($koneksi, "UPDATE peminjam SET nim='$nim',nama='$nama',email='$email', no_tlp='$no_tlp' WHERE id_peminjam='$id_peminjam'");

if($result){
    echo "Data Berhasil Disimpan";
    header("Location: user.php");
}else{
    echo "Gagal Disimpan";
}
?>