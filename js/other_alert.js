// Agregar eventos a los enlaces
document.getElementById('acercaLink').addEventListener('click', function (event) {
    event.preventDefault(); // Evita que el enlace se active
    Swal.fire('Acerca de', 'Información acerca de la página.', 'info');
});

document.getElementById('contactoLink').addEventListener('click', function (event) {
    event.preventDefault(); // Evita que el enlace se active
    Swal.fire('Contacto', 'Información de contacto.', 'info');
});

// Mostrar/Ocultar la contraseña
document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
    this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
});

// Manejo del formulario de inicio de sesión
document.getElementById('formLogin').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    // Enviar datos al servidor para autenticación
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    
    fetch('./model/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        if (result === "success") {
            // Mostrar mensaje de éxito con el nombre de usuario
            Swal.fire('¡Éxito!', `Bienvenido: ${username}`, 'success').then(() => {
                // Redirigir al admin.php después del mensaje
                window.location.href = './view/admin.php'; 
            });
        } else {
            Swal.fire('Error', result, 'error'); // Mostrar error con SweetAlert
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Hubo un problema al procesar tu solicitud.', 'error');
    });
});

// Verificar si Caps Lock está activado
function checkCapsLock(event, inputId) {
    const isCapsLock = event.getModifierState && event.getModifierState("CapsLock");
    const inputField = document.getElementById(inputId);
    const message = document.getElementById(inputId + 'Message');

    // Si Caps Lock está activado
    if (isCapsLock) {
        // Si no existe el mensaje, lo mostramos usando SweetAlert2
        if (!message) {
            Swal.fire({
                toast: true,  // Activamos el tipo de "toast"
                position: 'top-end',  // Posición en la pantalla (top-end: superior derecha)
                icon: 'warning',  // Tipo de mensaje: 'success', 'error', 'info', etc.
                title: '¡Atención! Caps Lock está activado.',  // El mensaje que se mostrará
                showConfirmButton: false,  // Ocultamos el botón de confirmación
                timer: 2000,  // Duración en milisegundos
                timerProgressBar: true,  // Barra de progreso visible
            });


        }
    } else {
        // Si Caps Lock no está activado, eliminamos el mensaje si existe
        if (message) {
            message.remove();
        }
    }
}

// Agregar eventos para detectar Caps Lock
document.getElementById('username').addEventListener('keydown', function(event) {
    checkCapsLock(event, 'username');
});

document.getElementById('password').addEventListener('keydown', function(event) {
    checkCapsLock(event, 'password');
});


// Función para validar inputs y prevenir inyecciones SQL
function validateInput(event) {
    const forbiddenCharacters = /['"<>;()--]/; // Caracteres comunes en inyecciones SQL
    const inputField = event.target;
    const submitButton = document.querySelector('button[type="submit"]'); // Obtener el botón de envío

    // Si el input contiene caracteres no permitidos
    if (forbiddenCharacters.test(inputField.value)) {
        // Prevenir que el formulario se envíe
        event.preventDefault();

        // Deshabilitar el botón de inicio de sesión
        submitButton.disabled = true;

        // Borrar el contenido de todos los campos del formulario
        document.querySelectorAll('input').forEach(input => {
            input.value = '';
        });

        // Mostrar un mensaje de advertencia
        Swal.fire({
            toast: true,  // Activamos el tipo de "toast"
            position: 'top-end',  // Posición en la pantalla (top-end: superior derecha)
            icon: 'warning',  // Tipo de mensaje: 'success', 'error', 'info', etc.
            title: 'Entrada no válida. Se han detectado caracteres prohibidos.',  // El mensaje que se mostrará
            showConfirmButton: false,  // Ocultamos el botón de confirmación
            timer: 2000,  // Duración en milisegundos
            timerProgressBar: true,  // Barra de progreso visible
        });

        return false; // Indicar que la validación falló
    }

    // Si el input no contiene caracteres prohibidos, habilitar el botón
    submitButton.disabled = false;
    return true; // Entrada válida
}

// Agregar un evento a todos los inputs del formulario
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('input', validateInput);  // Validar mientras el usuario escribe
});


// Función para verificar si algún input está vacío
function checkEmptyInputs(event) {
    const inputs = document.querySelectorAll('input'); // Obtener todos los inputs
    let isEmpty = false;

    // Verificar si alguno de los campos está vacío
    inputs.forEach(input => {
        if (input.value.trim() === '') {
            isEmpty = true; // Si algún campo está vacío
        }
    });

    // Si hay un campo vacío, mostrar un mensaje con SweetAlert
    if (isEmpty) {
        event.preventDefault(); // Evitar el envío del formulario

        Swal.fire(
            '¡Atención!',
            'Por favor, completa todos los campos antes de continuar.',
            'warning' // Tipo de mensaje: success, error, info, warning
        );
    }
}

// Agregar evento al formulario para verificar los campos vacíos antes de enviarlo
document.querySelector('form').addEventListener('submit', function(event) {
    checkEmptyInputs(event); // Verificar si hay campos vacíos
});






function trimInput(input) {
    input.value = input.value.trim();
}
