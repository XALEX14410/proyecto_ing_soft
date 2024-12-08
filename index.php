<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
</head>

<body>


 
    <!-- Caja de login centrada en la pantalla -->
    <div class="login-container">
        <div class="login-box">
        <img src="<?php echo dirname($_SERVER['PHP_SELF']) . '/img/1.png'; ?>" alt="Logo de la Empresa" class="logo">
            <h2>Iniciar Sesión</h2>

            <!-- Mensaje de error (inicialmente oculto) -->
            <div id="error-message" class="alert alert-danger" style="display: none;">
                <strong>Error:</strong> Usuario o contraseña incorrectos.
            </div>

            <form id="formLogin">
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" required  maxlength="10">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" required  maxlength="10">
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
        </div>
    </div>

    <!-- Botones fuera del header -->
    <div class="footer">
        <a href="#acerca" id="acercaLink">Acerca de</a>
        <a href="#contacto" id="contactoLink">Contacto</a>
    </div>

    <!-- Archivos de scripts -->
    <script src="./js/script.js"></script>
    <script src="./js/other_alert.js"></script>

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
