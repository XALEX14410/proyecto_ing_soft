<!DOCTYPE html>
<html>
<head>
    <title>Mapa con Rutas Predefinidas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <nav>
            <img src="logo.png" alt="Logo de la Empresa" class="logo">
            <ul>
                <li><a href="#usuarios" id="usuariosLink"> <i class="bi bi-person"></i> Usuarios</a></li>
                <li><a href="#acerca" id="acercaLink"> <i class="bi bi-info-circle"></i> Acerca de</a></li>
                <li><a href="#contacto" id="contactoLink"> <i class="bi bi-envelope"></i> Contacto</a></li>
            </ul>
        </nav>
    </header>
 <!-- Aquí irá el contenido de la página o formulario de inicio de sesión -->
 <div id="loginForm" class="container" style="display:none;">
            <h2>Iniciar Sesión</h2>
            <form id="formLogin">
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    <main>
        <section>
            <div class="section1">
                <div class="controles" id="controls">
                    <select class="selections" id="routeSelect" onchange="handleRouteChange()">
                        <option value="0">Selecciona una ruta</option>
                        <!-- Insertar opciones de rutas dinámicamente usando PHP -->
                        <?php include 'get_route_options.php'; ?>
                    </select>
                </div>
            </div>
            <div class="section2">
                <div class="mapa" id="map"></div>
            </div>
        </section>
    </main>
    <footer>
        <p>© 2024 Rutas Interactivas</p>
    </footer>
    <!-- Archivo de scripts -->
    <script src="./js/script.js"></script>
    <script src="./js/sweetalert.js"></script>
    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Cargar Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAq9j03sFyP0mKnCqgzdfVsQ4N1glWnW4k&callback=initMap&libraries=marker&callback=initMap" async defer></script>
</body>
</html>