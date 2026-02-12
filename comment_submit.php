<?php
include "config/koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penulis = mysqli_real_escape_string($koneksi, $_POST['nama_penulis']);
    $detail_komentar = mysqli_real_escape_string($koneksi, $_POST['detail_komentar']);
    $tanggal_komentar = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO tb_komentar (nama_penulis, tanggal_komentar, detail_komentar) 
              VALUES ('$nama_penulis', '$tanggal_komentar', '$detail_komentar')";
    
    if(mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Komentar berhasil dikirim! Terima kasih atas feedback Anda.');
                window.location.href = 'index.php#contact';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengirim komentar. Silakan coba lagi.');
                window.location.href = 'index.php#contact';
              </script>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
