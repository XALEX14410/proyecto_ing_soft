// Agregar el evento click al botón de cerrar sesión
document.getElementById('logoutBtn').addEventListener('click', function() {
    // Mostrar SweetAlert de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Si cierras sesión, tendrás que iniciar sesión nuevamente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirigir al archivo de cerrar sesión (cerrar_sesion.php)
            window.location.href = 'cerrar_sesion.php';
        }
    });
});