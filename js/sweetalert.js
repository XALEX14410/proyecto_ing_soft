// script.js

document.addEventListener('DOMContentLoaded', () => {
    // Obtener los enlaces del menú
    const usuarioLink = document.querySelector('#usuariosLink');
    const acercaLink = document.querySelector('#acercaLink');
    const contactoLink = document.querySelector('#contactoLink');

    // Función para mostrar alertas
    function showAlert(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }

    // Función para mostrar el formulario de inicio de sesión usando SweetAlert
    function showLoginForm() {
        Swal.fire({
            title: 'Iniciar Sesión',
            html: `
                <form id="formLogin">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Iniciar Sesión',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const username = Swal.getPopup().querySelector('#username').value;
                const password = Swal.getPopup().querySelector('#password').value;
                if (!username || !password) {
                    Swal.showValidationMessage('Por favor ingresa usuario y contraseña');
                    return false;
                }
                return { username: username, password: password };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor para autenticación
                const formData = new FormData();
                formData.append('username', result.value.username);
                formData.append('password', result.value.password);

                fetch('login.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    if (result.includes('Nombre de usuario o contraseña incorrectos')) {
                        Swal.fire('Error', 'Nombre de usuario o contraseña incorrectos.', 'error');
                    } else {
                        window.location.href = 'admin.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Hubo un problema al procesar tu solicitud.', 'error');
                });
            }
        });
    }

    // Añadir eventos de clic
    usuarioLink.addEventListener('click', (e) => {
        e.preventDefault();
        showLoginForm();
    });

    acercaLink.addEventListener('click', (e) => {
        e.preventDefault();
        showAlert('Acerca de', 'Información sobre la empresa.');
    });

    contactoLink.addEventListener('click', (e) => {
        e.preventDefault();
        showAlert('Contacto', 'Información para contactar con nosotros.');
    });
});
