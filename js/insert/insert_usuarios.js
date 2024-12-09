document.getElementById("form_usuario").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de la manera tradicional

    // Obtener los valores de los campos del formulario
    var usuario = document.getElementById("usuario").value;
    var ubicacion = document.getElementById("ubicacion").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value; // Nuevo campo
    var edad = document.getElementById("edad").value; // Nuevo campo
    var telefono = document.getElementById("telefono").value;
    var correo = document.getElementById("correo").value; // Nuevo campo
    var contraseña = document.getElementById("contraseña").value; // Nuevo campo
    var tipo = document.getElementById("tipo").value;
    var foto = document.getElementById("foto").value || 'image.png'; // Si está vacío, asignar 'image.png'

    // Crear el objeto de datos para enviar
    var formData = new FormData();
    formData.append("usuario", usuario);
    formData.append("ubicacion", ubicacion);
    formData.append("nombre", nombre);
    formData.append("apellido", apellido);
    formData.append("edad", edad);
    formData.append("telefono", telefono);
    formData.append("correo", correo);
    formData.append("contraseña", contraseña);
    formData.append("tipo", tipo);
    formData.append("foto", foto);

    // Realizar el POST usando Fetch API
    fetch("./../controller/insert/insertar_usuario.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
        // Mostrar la respuesta usando SweetAlert
        if (data.includes("exitosamente")) {
            // Alerta de éxito
            Swal.fire({
                title: 'Éxito!',
                text: 'Usuario insertado exitosamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else {
            // Alerta de error
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al insertar el usuario.',
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
