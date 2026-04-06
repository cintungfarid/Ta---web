<div style="padding: 20px;">
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="max-height: 500px; overflow-y: auto; overflow-x: auto; border-radius: 8px;">
            <table style="margin-top: 0;">
                <thead style="position: sticky; top: 0; z-index: 1;">
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Penulis</th>
                        <th>Tanggal</th>
                        <th>Komentar</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "../config/koneksi.php";

                    $hasStatusColumn = mysqli_query($koneksi, "SHOW COLUMNS FROM tb_komentar LIKE 'status_notifikasi'");
                    if ($hasStatusColumn && mysqli_num_rows($hasStatusColumn) > 0) {
                        mysqli_query(
                            $koneksi,
                            "UPDATE tb_komentar
                             SET status_notifikasi='read', dibaca_pada=NOW()
                             WHERE status_notifikasi='unread'"
                        );
                    }

                    $no = 1;
                    $komentar_tampil = mysqli_query($koneksi, "SELECT * FROM tb_komentar ORDER BY id_komentar DESC");
                    while ($hasil = mysqli_fetch_array($komentar_tampil))
                    {
                        echo "<tr>";
                        echo "<td align='center'>$no</td>";
                        echo "<td>$hasil[nama_penulis]</td>";
                        echo "<td>$hasil[tanggal_komentar]</td>";
                        echo "<td>$hasil[detail_komentar]</td>";
                        echo "<td align='center'><a href='#' onclick=\"confirmDeleteKomentar('{$hasil['id_komentar']}', '{$hasil['nama_penulis']}')\" class='btn btn-delete btn-sm'>Hapus</a></td>";
                        echo "</tr>";

                        $no++;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['swal'])) {
    $swal = $_SESSION['swal'];
    unset($_SESSION['swal']);
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '{$swal['icon']}',
            title: '{$swal['title']}',
            text: '{$swal['text']}',
            timer: 2000,
            showConfirmButton: false
        });
    });
    </script>";
}
?>
<script src="js/komentar.js"></script>
