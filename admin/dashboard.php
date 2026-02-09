<?php
include '../config/koneksi.php';

$merch = 0;
$komen = 0;

$query_merch = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_merchandise");
if ($query_merch) {
    $result = mysqli_fetch_assoc($query_merch);
    if ($result) {
        $merch = $result['total'];
    }
}

$query_komen = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_komentar");
if ($query_komen) {
    $result = mysqli_fetch_assoc($query_komen);
    if ($result) {
        $komen = $result['total'];
    }
}

$query_log = mysqli_query($koneksi, "SELECT * FROM tb_log_aktivitas ORDER BY waktu DESC");
?>

<div style="max-width: 1400px; margin: 15px auto 0; padding: 0 20px;">
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); text-align: center; flex: 1; min-width: 300px;">
            <h6 style="font-size: 18px; margin-bottom: 15px; color: #666;">Merchandise</h6>
            <h3 style="font-size: 48px; margin: 0; color: #11998e;"><?= $merch ?></h3>
        </div>

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); text-align: center; flex: 1; min-width: 300px;">
            <h6 style="font-size: 18px; margin-bottom: 15px; color: #666;">Komentar</h6>
            <h3 style="font-size: 48px; margin: 0; color: #11998e;"><?= $komen ?></h3>
        </div>
    </div>
</div>

<div style="max-width: 1400px; margin: 20px auto; padding: 0 20px;">
    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 20px;">
            <h4 style="margin: 0; color: #333; font-size: 20px;">Log Aktivitas Admin</h4>
        </div>
        <div style="overflow-x: auto; max-height: 270px; overflow-y: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8f9fa;">
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">No</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">Admin</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">Aksi</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if(mysqli_num_rows($query_log) > 0):
                        while($data = mysqli_fetch_array($query_log)): 
                    ?>
                    <tr style="border-bottom: 1px solid #dee2e6;">
                        <td style="padding: 12px;"><?= $no++ ?></td>
                        <td style="padding: 12px; font-weight: 500;"><?= $data['admin_name'] ?></td>
                        <td style="padding: 12px;"><?= $data['aksi'] ?></td>
                        <td style="padding: 12px; color: #6c757d; font-size: 14px;"><?= date('d/m/Y H:i', strtotime($data['waktu'])) ?></td>
                    </tr>
                    <?php 
                        endwhile;
                    else:
                    ?>
                    <tr>
                        <td colspan="4" style="padding: 20px; text-align: center; color: #6c757d;">Belum ada aktivitas</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>