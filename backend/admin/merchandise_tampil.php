<div style="text-align: right; margin-bottom: 20px;">
    <?php
        echo "<a href='index.php?page=merchandise_input' class='btn btn-add'>+ Tambah Merchandise</a>";
    ?>
</div>

<table>
    <thead>
        <tr>
            <th width="5%">No.</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include "../config/koneksi.php"; 
        $no = 1;
        $merchandise_tampil = mysqli_query($koneksi, "SELECT * FROM tb_merchandise");
        while ($hasil = mysqli_fetch_array($merchandise_tampil))
        {
            echo "<tr>";
            echo "<td align='center'>$no</td>";
            echo "<td>{$hasil['judul_merchandise']}</td>";
            echo "<td>Rp " . number_format($hasil['harga_merchandise'], 0, ',', '.') . "</td>";
            echo "<td align='center'>{$hasil['stock_merchandise']}</td>";
            echo "<td>{$hasil['detail_merchandise']}</td>";
            echo "<td align='center'><img src='../{$hasil['foto_merchandise']}' alt='' width='100' style='border-radius: 6px;'></td>";
            echo "<td align='center'>";
            echo "<a href='index.php?page=merchandise_input&status=edit&id_merchandise={$hasil['id_merchandise']}' class='btn btn-edit btn-sm'>Edit</a> ";
            echo "<a href='#' onclick=\"confirmDeleteMerchandise('{$hasil['id_merchandise']}', '{$hasil['judul_merchandise']}')\" class='btn btn-delete btn-sm'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
            
            $no++;
        }
    ?>
    </tbody>
</table>

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
<script src="js/merchandise.js"></script>