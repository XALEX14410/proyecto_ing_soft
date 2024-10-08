<?php
class componentes {
    public function generaMenu() {
        ?>
        <header>
        <nav>
            <img src="logo.png" alt="Logo de la Empresa" class="logo">
            <ul>
                <li><a href="admin.php"> <i class="bi bi-house-door"></i> Inicio</a></li>
                <li><a href="#addRoute" data-bs-toggle="modal" data-bs-target="#addRouteModal"> <i class="bi bi-plus-circle"></i> Agregar Ruta</a></li>
                <!-- Más opciones de administración aquí -->
            </ul>
        </nav>
     </header>

        <?php
    }


    public function footer(){
        ?><footer>
        <p>© 2024 Rutas Interactivas</p>
    </footer>
    <?php
    }
}
?>