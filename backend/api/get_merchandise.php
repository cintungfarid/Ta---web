<?php
header('Content-Type: application/json');
include "../config/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM tb_merchandise WHERE stock_merchandise > 0 ORDER BY id_merchandise DESC");

$merchandise = array();
while ($row = mysqli_fetch_assoc($query)) {
    $merchandise[] = $row;
}

echo json_encode([
    'success' => true,
    'data' => $merchandise
]);
?>
