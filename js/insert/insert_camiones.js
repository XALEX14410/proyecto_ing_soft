document.getElementById("form_camion").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de la manera tradicional

    // Obtener los valores de los campos del formulario
    var numero = document.getElementById("numero").value;
    var id_conductor = document.getElementById("id_conductor").value;
    var agencia = document.getElementById("agencia").value;
    var estado = document.getElementById("estado").value;

    // Crear el objeto de datos para enviar
    var formData = new FormData();
    formData.append("numero", numero);
    formData.append("id_conductor", id_conductor);
    formData.append("agencia", agencia);
    formData.append("estado", estado);

    // Realizar el POST usando Fetch API
    fetch("./../controller/insert/insertar_camion.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
        // Mostrar la respuesta usando SweetAlert
        if (data.includes("insertado exitosamente")) {
            // Alerta de éxito
            Swal.fire({
                title: 'Éxito!',
                text: 'Camión insertado exitosamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                // Recargar la página después de una inserción exitosa
                location.reload(); // Recarga la página
            });
        } else {
            // Alerta de error con el detalle del problema (por ejemplo, duplicado)
            Swal.fire({
                title: 'Error',
                html: 'Hubo un problema al insertar el camión: <br><b>' + data + '</b>',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Alerta de error en caso de fallo
        Swal.fire({
            title: 'Error',
            text: 'Hubo un error al enviar los datos.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    });
});
