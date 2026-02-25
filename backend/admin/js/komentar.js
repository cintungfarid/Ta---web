function confirmDeleteKomentar(id, nama) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: 'Apakah yakin ingin menghapus komentar dari "' + nama + '"?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'komentar_proses.php?status=hapus&id_komentar=' + id;
        }
    });
}
