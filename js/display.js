// Obtener el botón y el contenedor del formulario
const insertarBtn = document.getElementById('insertarBtn');
const formContainer = document.getElementById('formContainer');

// Agregar evento al botón para alternar la visibilidad del formulario
insertarBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Evita el comportamiento por defecto del enlace

    // Alternar la visibilidad del formulario
    if (formContainer.style.display === "none" || formContainer.style.display === "") {
        formContainer.style.display = "block"; // Mostrar el formulario
    } else {
        formContainer.style.display = "none"; // Ocultar el formulario
    }
});
