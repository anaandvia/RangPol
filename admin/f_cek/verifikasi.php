<?php
    require('koneksi.php');

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM peminjam where code = '$code'";
        $query = mysqli_query($koneksi,$sql);
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            $id = $user['id_peminjam'];
            $sql =  "UPDATE peminjam set v_email=1 where id_peminjam=$id";
            $query = mysqli_query($koneksi,$sql);
            if($query){
                header("location:v_berhasil.php");
            }else{
                echo "<script>alert('Verifikasi Gagal'.$query);window.location='login.php';</script>";
            }
        }else {
            echo "<script>alert('CODE TIDAK DITEMUKAN ATAU TIDAK VALID');window.location='login.php';</script>";
        }
    }else {
        echo "<script>alert('CODE TIDAK DITEMUKAN');window.location='login.php';</script>";
    }

?>