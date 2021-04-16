<?php 
include 'koneksi.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_tlp = $_POST['no_tlp'];
$input = mysqli_query($koneksi,"INSERT INTO peminjam VALUES ('','$nim','$nama','$email','$no_tlp')");
if($input){
    echo "Data Berhasil Disimpan";
        header("location:user.php");
}else{
    echo "Gagal Disimpan";
}
?>