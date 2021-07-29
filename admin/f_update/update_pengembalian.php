<?php
// include database connection file
include 'koneksi.php';
// ambil dari inputan/pilihan user
$id_peminjaman = $_POST['id_peminjaman'];
$id = $_POST['id'];
$status_kembali = $_POST['status_kembali'];
$tgl= date('l, d-m-Y');

// ambil data peminjaman dan ruangan 
$query = mysqli_query($koneksi, "SELECT*FROM peminjaman WHERE id_peminjaman='$id_peminjaman'");
$data2 = mysqli_fetch_array($query);
$id_ruangan = $data2['id_ruangan'];

// update
$sql = mysqli_query($koneksi, "UPDATE pengembalian SET status_kembali='$status_kembali' WHERE id='$id'");
$sql2 = mysqli_query($koneksi,"UPDATE peminjaman SET status='3' WHERE id_peminjaman='$id_peminjaman'");
$sql3 = mysqli_query($koneksi,"UPDATE ruangan SET status='1' WHERE id_ruangan ='$id_ruangan'");

// kondisi
if($sql && $sql2 && $sql3 == true){
    echo "<script>alert('Data berhasil disimpan.');window.location='pengembalian.php';</script>";
}else{
    echo "<script>alert('Data gagal disimpan.');window.location='pengembalian.php';</script>";

}
?>