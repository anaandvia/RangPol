<?php
// include database connection file
include '../koneksi.php';
$id_peminjaman = $_POST['id_peminjaman'];
$id_ruangan = $_POST['id_ruangan'];
$status = $_POST['status'];
$sql= mysqli_query($koneksi, "UPDATE peminjaman SET status='$status' WHERE id_peminjaman='$id_peminjaman'");

if($sql){
    if($status == 1){
    $sql2 = mysqli_query($koneksi,"UPDATE ruangan SET status= 0 WHERE id_ruangan='$id_ruangan'");
    }
    echo "<script>alert('Data berhasil diubah.');window.location='../view/peminjaman.php';</script>";
}else{
    echo "<script>alert('Data gagal diubah.');window.location='../view/peminjaman.php';</script>";
}
?>