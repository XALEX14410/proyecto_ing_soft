document.getElementById("formHorario").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío tradicional del formulario

    // Obtener los valores de los campos del formulario
    var idRoute = document.getElementById("id_route").value;
    var hora = document.getElementById("hora").value;

    // Crear el objeto de datos para enviar
    var formData = new FormData();
    formData.append("id_route", idRoute);
    formData.append("hora", hora);

    // Realizar el POST usando Fetch API
    fetch("./../controller/insert/insertar_horario.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
        // Mostrar la respuesta usando SweetAlert
        if (data.includes("exitosamente")) {
            Swal.fire({
                title: 'Éxito!',
                text: 'Horario insertado exitosamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
            .then(() => {
                // Limpiar el formulario y recargar la página
                document.getElementById("formHorario").reset();  // Vaciar el formulario
                window.location.reload();  // Recargar la página
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al insertar el horario.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error',
            text: 'Hubo un error al enviar los datos.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    });
});
