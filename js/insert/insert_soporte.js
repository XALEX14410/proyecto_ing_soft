document.getElementById("formProblema").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío tradicional del formulario

    // Obtener los valores de los campos del formulario
    var tipoProblema = document.getElementById("tipo_problema").value;
    var problema = document.getElementById("problema").value;
    var idUsuario = document.getElementById("id_usuario").value;
    var solucionado = document.getElementById("solucionado").value; // Siempre será 0

    // Crear un objeto FormData para enviar los datos
    var formData = new FormData();
    formData.append("tipo_problema", tipoProblema);
    formData.append("problema", problema);
    formData.append("id_usuario", idUsuario);
    formData.append("solucionado", solucionado);

    // Realizar la petición POST usando Fetch API
    fetch("./../controller/insert/insertar_problema.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
        console.log("Respuesta del servidor:", data);

        if (data.includes("exitosamente")) {
            Swal.fire({
                title: '¡Éxito!',
                text: 'Problema registrado exitosamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                // Limpiar el formulario y recargar la página
                document.getElementById("formProblema").reset(); // Vaciar el formulario
                window.location.reload(); // Recargar la página
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al registrar el problema.',
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
