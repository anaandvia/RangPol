<?php 
include '../../admin/koneksi.php';
$id_peminjam        = htmlspecialchars($_POST['id_peminjam']);
$id_ruangan         = htmlspecialchars($_POST['id_ruangan']);
$nama_kegiatan      = htmlspecialchars($_POST['nama_kegiatan']);
$tgl_acara          = htmlspecialchars($_POST['tgl_acara']);
$tgl_akhir_acara    = htmlspecialchars($_POST['tgl_akhir_acara']);
$PJ                 = htmlspecialchars($_POST['PJ']);
$PK                 = htmlspecialchars($_POST['PK']);
$PA                 = htmlspecialchars($_POST['PA']);
$n_tamu             = htmlspecialchars($_POST['n_tamu']);
$sifat_acara        = htmlspecialchars($_POST['sifat_acara']);
$jenis_acara        = htmlspecialchars($_POST['jenis_acara']);
$keterangan         = htmlspecialchars($_POST['keterangan']);
$status             = 0;


$sql = mysqli_query($koneksi,"INSERT INTO peminjaman (id_peminjaman, id_peminjam, id_ruangan, nama_kegiatan, tgl_acara, tgl_akhir_acara,status) VALUES ('','$id_peminjam','$id_ruangan','$nama_kegiatan','$tgl_acara','$tgl_akhir_acara','$status')");

$id_peminjaman = mysqli_insert_id($koneksi);

$sql2 = mysqli_query($koneksi,"INSERT INTO detail_acara VALUES ('','$id_peminjaman','$PJ','$PA','$PK','$n_tamu','$sifat_acara','$jenis_acara','$keterangan')");

$sql3 = mysqli_query($koneksi,"INSERT INTO pengembalian VALUES ('','','$id_peminjaman','','','$status')");

if($sql && $sql2 && $sql3 == true){
    echo "<script>alert('Data berhasil disimpan.');window.location='../view/history.php';</script>";
}else{
    echo "<script>alert('Data gagal disimpan.');window.location='../peminjaman.php';</script>";

}
mysqli_close($koneksi);
?>