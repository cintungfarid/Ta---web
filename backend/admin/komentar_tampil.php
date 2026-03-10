<table>
    <thead>
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