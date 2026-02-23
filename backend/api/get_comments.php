<?php
header('Content-Type: application/json');
include "../config/koneksi.php";

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
$query = mysqli_query($koneksi, "SELECT * FROM tb_komentar ORDER BY tanggal_komentar DESC LIMIT $limit");

$comments = array();
while ($row = mysqli_fetch_assoc($query)) {
    $comments[] = $row;
}

echo json_encode([
    'success' => true,
    'data' => $comments
]);
?>
