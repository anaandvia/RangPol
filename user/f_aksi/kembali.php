<?php
// include database connection file
include '../../admin/koneksi.php';
$id2 = $_POST['id2'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];
$foto_b = isset($_FILES['foto_b']['name']) ? $_FILES['foto_b']['name'] : '';
$kendala = $_POST['kendala'];

//cek dulu jika merubah gambar produk jalankan coding ini
if($foto_b != "") {
    $ekstensifotoV = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto_b); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensifoto = strtolower(end($x));
    $random = rand(1,999);
    $fotoB = $random.'-'.$foto_b;
    $tmpName = $_FILES['foto_b']['tmp_name'];   
    if(in_array($ekstensifoto, $ekstensifotoV) === true)  {
          move_uploaded_file($tmpName, '../../admin/view/asset/img/bukti/'.$fotoB); //memindah file gambar ke folder gambar
                    
                  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                $query ="UPDATE pengembalian SET tgl_pengembalian='$tgl_pengembalian',foto_b='$fotoB',kendala='$kendala', status_kembali=2 WHERE id='$id2'";
                $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_error($koneksi).
                        " - ".mysqli_error($koneksi));
                } else {
                    echo "<script>alert('Data berhasil dikirimkan. Tunggu konfirmasi Admin');window.location='../view/history.php';</script>";
                }
            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../view/kembalikan.php?id='.$id2.'';</script>";
            }
    } else {
        echo "<script>alert('Pilih Gambar Terlebih dahulu.');window.location='../view/kembalikan.php?id='.$id2.'';</script>";
}
?>