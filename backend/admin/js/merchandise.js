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
