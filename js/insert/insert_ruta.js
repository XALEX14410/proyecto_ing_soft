let coordenadasArray = [];  // Para almacenar las coordenadas como objetos JSON
let formRuta = document.getElementById('form_ruta');
let coordenadasInput = document.getElementById('coordenadas');
let paradasContainer = document.getElementById('paradas-container');

// Añadir un evento para agregar una nueva parada de coordenadas
document.getElementById("add-parada-btn").addEventListener("click", function () {
    // Crear un nuevo bloque de input para latitud y longitud de la parada
    let paradaDiv = document.createElement('div');
    paradaDiv.classList.add('parada');

    // Input para la parada (un solo campo)
    let coordInput = document.createElement('input');
    coordInput.type = 'text';
    coordInput.classList.add('coordenada');
    coordInput.placeholder = "Latitud, Longitud de la parada";

    paradaDiv.appendChild(coordInput);

    paradasContainer.appendChild(paradaDiv);  // Agregar la parada al contenedor
});

// Enviar el formulario
formRuta.addEventListener("submit", function (event) {
    event.preventDefault();  // Evitar que se envíe el formulario de manera tradicional

    // Obtener coordenada inicial
    const coordenadaInicio = document.getElementById('coordenada_inicio').value.trim();
    // Obtener coordenada final
    const coordenadaFinal = document.getElementById('coordenada_final').value.trim();

    // Validar si se han ingresado las coordenadas de inicio y final
    if (!coordenadaInicio || !coordenadaFinal) {
        alert("Debe ingresar tanto la coordenada de inicio como la final.");
        return;
    }

    // Empezamos con las coordenadas iniciales (convertir a objeto)
    coordenadasArray = [convertirACoordenada(coordenadaInicio)];  // Inicializamos con la coordenada de inicio

    // Recoger las coordenadas de las paradas (solo si existen)
    const paradas = document.querySelectorAll('.coordenada');

    // Verifica si hay paradas y si tienen valor
    for (let i = 0; i < paradas.length; i++) {
        let coord = paradas[i].value.trim();

        // Solo agregar coordenadas válidas
        if (coord) {
            coordenadasArray.push(convertirACoordenada(coord));  // Agregar coordenada válida
        }
    }

    // Agregar la coordenada final
    coordenadasArray.push(convertirACoordenada(coordenadaFinal));  // Agregar la coordenada final

    // Asegurarse de que el campo oculto tenga las coordenadas completas en el formato requerido
    coordenadasInput.value = JSON.stringify(coordenadasArray);  // Convertimos a JSON

    // Ver las coordenadas que se enviarán
    console.log("Coordenadas enviadas:", coordenadasInput.value);

    // Enviar las coordenadas al servidor mediante Fetch
    fetch("./../controller/insert/insertar_ruta.php", {
        method: "POST",
        body: new URLSearchParams(new FormData(formRuta)),  // Usar FormData para enviar los datos del formulario
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"  // Asegurarse de usar el tipo correcto para el POST
        }
    })
        .then(response => response.text())  // Procesar la respuesta del servidor
        .then(data => {
            console.log("Respuesta del servidor:", data);  // Aquí puedes manejar la respuesta del servidor

            // Mostrar la respuesta usando SweetAlert
            if (data.includes("exitosamente")) {
                // Alerta de éxito
                Swal.fire({
                    title: 'Éxito!',
                    text: 'Ruta insertada exitosamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    // Limpiar el formulario y recargar la página
                    formRuta.reset();  // Vaciar el formulario
                    window.location.reload();  // Recargar la página
                });
            } else {
                // Alerta de error
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al insertar la ruta.',
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

// Función para convertir una coordenada en formato 'lat, lng' a un objeto JSON
function convertirACoordenada(coordenada) {
    let coords = coordenada.split(',');  // Dividir latitud y longitud
    return {
        lat: parseFloat(coords[0].trim()),  // Convertir a número flotante
        lng: parseFloat(coords[1].trim())   // Convertir a número flotante
    };
}
