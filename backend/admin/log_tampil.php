<?php
include '../config/koneksi.php';

$limit = 50;
$page = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
$offset = ($page - 1) * $limit;

$count_query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_log_aktivitas");
$count_data = mysqli_fetch_assoc($count_query);
$total_records = $count_data['total'];
$total_pages = ceil($total_records / $limit);

$query = mysqli_query($koneksi, "SELECT * FROM tb_log_aktivitas ORDER BY waktu DESC LIMIT $limit OFFSET $offset");
?>

<div style="padding: 20px;">
    <h2 style="margin-bottom: 20px; color: #333;">Riwayat Aktivitas Admin</h2>
    
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: linear-gradient(135deg, #11998e, #38ef7d);">
                        <th style="padding: 15px; text-align: left; color: white; font-weight: 600;">No</th>
                        <th style="padding: 15px; text-align: left; color: white; font-weight: 600;">Admin</th>
                        <th style="padding: 15px; text-align: left; color: white; font-weight: 600;">Aksi</th>
                        <th style="padding: 15px; text-align: left; color: white; font-weight: 600;">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(mysqli_num_rows($query) > 0):
                        $no = $offset + 1;
                        while($data = mysqli_fetch_array($query)): 
                    ?>
                    <tr style="border-bottom: 1px solid #dee2e6;">
                        <td style="padding: 15px;"><?= $no++ ?></td>
                        <td style="padding: 15px; font-weight: 500;"><?= htmlspecialchars($data['admin_name']) ?></td>
                        <td style="padding: 15px;"><?= htmlspecialchars($data['aksi']) ?></td>
                        <td style="padding: 15px; color: #6c757d;"><?= date('d/m/Y H:i:s', strtotime($data['waktu'])) ?></td>
                    </tr>
                    <?php 
                        endwhile;
                    else:
                    ?>
                    <tr>
                        <td colspan="4" style="padding: 30px; text-align: center; color: #6c757d;">Belum ada aktivitas yang tercatat</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($total_pages > 1): ?>
        <div style="margin-top: 20px; display: flex; justify-content: center; gap: 5px;">
            <?php if($page > 1): ?>
                <a href="index.php?page=log_tampil&hal=<?= $page - 1 ?>" style="padding: 8px 15px; background: #11998e; color: white; text-decoration: none; border-radius: 4px;">← Prev</a>
            <?php endif; ?>

            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <?php if($i == $page): ?>
                    <span style="padding: 8px 15px; background: #38ef7d; color: white; border-radius: 4px; font-weight: 600;"><?= $i ?></span>
                <?php else: ?>
                    <a href="index.php?page=log_tampil&hal=<?= $i ?>" style="padding: 8px 15px; background: #e9ecef; color: #333; text-decoration: none; border-radius: 4px;"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if($page < $total_pages): ?>
                <a href="index.php?page=log_tampil&hal=<?= $page + 1 ?>" style="padding: 8px 15px; background: #11998e; color: white; text-decoration: none; border-radius: 4px;">Next →</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>