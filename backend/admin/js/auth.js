function showAlert(icon, title, text, redirect) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        confirmButtonText: 'OK'
    }).then(() => {
        window.location = redirect;
    });
}
