<?php
include '../config/koneksi.php';

$merch = 0;
$komen = 0;
$admin = 0;

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

$query_admin = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_admin");
if ($query_admin) {
    $result = mysqli_fetch_assoc($query_admin);
    if ($result) {
        $admin = $result['total'];
    }
}

$query_log = mysqli_query($koneksi, "SELECT * FROM tb_log_aktivitas ORDER BY waktu DESC");
$query_admin_list = mysqli_query($koneksi, "SELECT nama_admin, user_name FROM tb_admin ORDER BY nama_admin ASC");
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

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); text-align: center; flex: 1; min-width: 300px;">
            <h6 style="font-size: 18px; margin-bottom: 15px; color: #666;">Admin</h6>
            <h3 style="font-size: 48px; margin: 0; color: #11998e;"><?= $admin ?></h3>
        </div>
    </div>
</div>

<div style="max-width: 1400px; margin: 20px auto; padding: 0 20px;">
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); flex: 1; min-width: 420px;">
            <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
                <h4 style="margin: 0; color: #333; font-size: 20px;">Data Admin</h4>
                <a href="index.php?page=admin_tampil" style="display: inline-block; padding: 10px 18px; background: #11998e; color: #fff; text-decoration: none; border-radius: 6px; font-size: 14px; font-weight: 600;">Kelola Admin</a>
            </div>
            <div style="overflow-x: auto; max-height: 270px; overflow-y: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8f9fa;">
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">No</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">Nama Admin</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_admin = 1;
                        if ($query_admin_list && mysqli_num_rows($query_admin_list) > 0):
                            while ($data_admin = mysqli_fetch_assoc($query_admin_list)):
                        ?>
                        <tr style="border-bottom: 1px solid #dee2e6;">
                            <td style="padding: 12px;"><?= $no_admin++ ?></td>
                            <td style="padding: 12px; font-weight: 500;"><?= htmlspecialchars($data_admin['nama_admin'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td style="padding: 12px; color: #6c757d;"><?= htmlspecialchars($data_admin['user_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <?php
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="3" style="padding: 20px; text-align: center; color: #6c757d;">Belum ada data admin</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); flex: 1.4; min-width: 420px;">
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
                    if (mysqli_num_rows($query_log) > 0):
                        while ($data = mysqli_fetch_array($query_log)): 
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
</div>
