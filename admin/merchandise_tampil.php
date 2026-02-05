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
            echo "<td>{$hasil['detail_merchandise']}</td>";
            echo "<td align='center'><img src='{$hasil['foto_merchandise']}' alt='' width='100' style='border-radius: 6px;'></td>";
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

<script>
function confirmDeleteMerchandise(id, judul) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: 'Apakah yakin ingin menghapus merchandise "' + judul + '"?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'merchandise_proses.php?status=hapus&id_merchandise=' + id;
        }
    });
}
</script>