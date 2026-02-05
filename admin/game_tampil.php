<div style="text-align: right; margin-bottom: 20px;">
    <?php
        echo "<a href='index.php?page=game_input' class='btn btn-add'>+ Tambah Game</a>";
    ?>
</div>

<table>
    <thead>
        <tr>
            <th width="5%">No.</th>
            <th>ID Game</th>
            <th>Judul Game</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include "../config/koneksi.php"; 
        $no = 1;
        $game_tampil = mysqli_query($koneksi, "SELECT * FROM tb_game");
        while ($hasil = mysqli_fetch_array($game_tampil))
        {
            echo "<tr>";
            echo "<td align='center'>$no</td>";
            echo "<td>$hasil[id_game]</td>";
            echo "<td>$hasil[judul_game]</td>";
            echo "<td>$hasil[tanggal_game]</td>";
            echo "<td>$hasil[detail_game]</td>";
            echo "<td align='center'><img src='$hasil[foto_game]' alt='' width='120' style='border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);'></td>";
            echo "<td align='center'><a href='index.php?page=game_input&status=edit&id_game=$hasil[id_game]' class='btn btn-edit btn-sm'>Edit</a></td>";
            echo "<td align='center'><a href='#' onclick=\"confirmDelete('$hasil[id_game]', '$hasil[judul_game]')\" class='btn btn-delete btn-sm'>Hapus</a></td>";
            echo "</tr>";
            
            $no++;
        }
    ?>
    </tbody>
</table>

<script>
function confirmDelete(id, judul) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: 'Apakah yakin ingin menghapus game "' + judul + '"?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'game_proses.php?status=hapus&id_game=' + id;
        }
    });
}
</script>