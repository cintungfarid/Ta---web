<table>
    <thead>
        <tr>
            <th width="5%">No.</th>
            <th width="10%">ID Komentar</th>
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
        $komentar_tampil = mysqli_query($koneksi, "SELECT * FROM tb_komentar");
        while ($hasil = mysqli_fetch_array($komentar_tampil))
        {
            echo "<tr>";
            echo "<td align='center'>$no</td>";
            echo "<td>$hasil[id_komentar]</td>";
            echo "<td>$hasil[nama_penulis]</td>";
            echo "<td>$hasil[tanggal_komentar]</td>";
            echo "<td>$hasil[detail_komentar]</td>";
            echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah yakin di hapus??'))
            {window.location.href='komentar_proses.php?status=hapus&id_komentar=$hasil[id_komentar]';}\" class='btn btn-delete btn-sm'>Hapus</a></td>";
            echo "</tr>";
            
            $no++;
        }
    ?>
    </tbody>
</table>