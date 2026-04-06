function confirmDeleteAdmin(userName, namaAdmin) {
    Swal.fire({
        title: 'Hapus Admin?',
        text: 'Admin ' + namaAdmin + ' akan dihapus.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'admin_proses.php?status=hapus&user_name=' + encodeURIComponent(userName);
        }
    });
}
