<?php
include "../config/koneksi.php";

function ensureKomentarNotificationColumns($koneksi)
{
    $hasStatus = mysqli_query($koneksi, "SHOW COLUMNS FROM tb_komentar LIKE 'status_notifikasi'");
    if ($hasStatus && mysqli_num_rows($hasStatus) === 0) {
        mysqli_query($koneksi, "ALTER TABLE tb_komentar ADD COLUMN status_notifikasi ENUM('unread','read') NOT NULL DEFAULT 'unread'");
    }

    $hasReadAt = mysqli_query($koneksi, "SHOW COLUMNS FROM tb_komentar LIKE 'dibaca_pada'");
    if ($hasReadAt && mysqli_num_rows($hasReadAt) === 0) {
        mysqli_query($koneksi, "ALTER TABLE tb_komentar ADD COLUMN dibaca_pada DATETIME NULL DEFAULT NULL");
    }
}

ensureKomentarNotificationColumns($koneksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penulis = mysqli_real_escape_string($koneksi, $_POST['nama_penulis']);
    $detail_komentar = mysqli_real_escape_string($koneksi, $_POST['detail_komentar']);
    $tanggal_komentar = date('Y-m-d H:i:s');

    $query = "INSERT INTO tb_komentar (nama_penulis, tanggal_komentar, detail_komentar, status_notifikasi, dibaca_pada) 
              VALUES ('$nama_penulis', '$tanggal_komentar', '$detail_komentar', 'unread', NULL)";

    $is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

    if (mysqli_query($koneksi, $query)) {
        if ($is_ajax) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Komentar berhasil dikirim',
                'notification' => [
                    'type' => 'komentar_baru',
                    'created_at' => $tanggal_komentar
                ]
            ]);
        } else {
            echo "<script>
                    alert('Komentar berhasil dikirim! Terima kasih atas feedback Anda.');
                    window.location.href = '../../index.php#contact';
                  </script>";
        }
    } else {
        if ($is_ajax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Gagal mengirim komentar']);
        } else {
            echo "<script>
                    alert('Gagal mengirim komentar. Silakan coba lagi.');
                    window.location.href = '../../index.php#contact';
                  </script>";
        }
    }
} else {
    header("Location: ../../index.php");
    exit();
}
?>
