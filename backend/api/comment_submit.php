<?php
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penulis = mysqli_real_escape_string($koneksi, $_POST['nama_penulis']);
    $detail_komentar = mysqli_real_escape_string($koneksi, $_POST['detail_komentar']);
    $tanggal_komentar = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO tb_komentar (nama_penulis, tanggal_komentar, detail_komentar) 
              VALUES ('$nama_penulis', '$tanggal_komentar', '$detail_komentar')";
    
    $is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    
    if (mysqli_query($koneksi, $query)) {
        if ($is_ajax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Komentar berhasil dikirim']);
        } else {
            echo "<script>
                    alert('Komentar berhasil dikirim! Terima kasih atas feedback Anda.');
                    window.location.href = '../../frontend/index.php#contact';
                  </script>";
        }
    } else {
        if ($is_ajax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Gagal mengirim komentar']);
        } else {
            echo "<script>
                    alert('Gagal mengirim komentar. Silakan coba lagi.');
                    window.location.href = '../../frontend/index.php#contact';
                  </script>";
        }
    }
} else {
    header("Location: ../../frontend/index.php");
    exit();
}
?>
