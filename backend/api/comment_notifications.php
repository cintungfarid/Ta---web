<?php
session_start();
include "../config/koneksi.php";

header('Content-Type: application/json');

if (!isset($_SESSION['user_name'])) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Unauthorized'
    ]);
    exit();
}

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

$action = isset($_GET['action']) ? $_GET['action'] : 'count';

if ($action === 'mark_read') {
    $updated = mysqli_query(
        $koneksi,
        "UPDATE tb_komentar 
         SET status_notifikasi='read', dibaca_pada=NOW() 
         WHERE status_notifikasi='unread'"
    );

    echo json_encode([
        'success' => (bool) $updated,
        'message' => $updated ? 'Notifikasi komentar ditandai sudah dibaca.' : 'Gagal memperbarui notifikasi komentar.'
    ]);
    exit();
}

$countResult = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total_unread FROM tb_komentar WHERE status_notifikasi='unread'"
);
$countRow = $countResult ? mysqli_fetch_assoc($countResult) : ['total_unread' => 0];

$listResult = mysqli_query(
    $koneksi,
    "SELECT id_komentar, nama_penulis, detail_komentar, tanggal_komentar
     FROM tb_komentar
     WHERE status_notifikasi='unread'
     ORDER BY id_komentar DESC
     LIMIT 5"
);

$notifications = [];
if ($listResult) {
    while ($row = mysqli_fetch_assoc($listResult)) {
        $notifications[] = [
            'id_komentar' => $row['id_komentar'],
            'nama_penulis' => $row['nama_penulis'],
            'detail_komentar' => $row['detail_komentar'],
            'tanggal_komentar' => $row['tanggal_komentar']
        ];
    }
}

echo json_encode([
    'success' => true,
    'total_unread' => (int) $countRow['total_unread'],
    'notifications' => $notifications
]);
?>
