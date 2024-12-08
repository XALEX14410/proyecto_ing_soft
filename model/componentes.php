<?php
class Componentes
{
    public function generaMenu()
    {
?>
        <header>
            <nav>
                <!-- Logo -->
                <img src="<?php echo dirname($_SERVER['PHP_SELF']) . '/../img/1.png'; ?>" alt="Logo de la Empresa" class="logo">
                <ul class="menu">
                    <li class="menu-item"><a href="admin.php" class="menu-link"><i class="bi bi-house-door-fill"></i> Inicio</a></li>
                    <li class="menu-item"><a href="perfil.php" class="menu-link"><i class="bi bi-person-fill"></i> Perfil</a></li>
                    <!-- <li class="menu-item"><a href="configuracion.php" class="menu-link"><i class="bi bi-gear-fill"></i> Configuración</a></li> -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link red" id="logoutBtn">
                            <i class="bi bi-arrow-right-square-fill"></i> Cerrar sesión
                        </a>
                    </li>

                </ul>
            </nav>
        </header><script src="./../js/cerrar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    }

  



    public function footer(){
    ?>
    <footer>
    <p>© 2024 Rutas Interactivas</p>
    </footer>
    <?php
    }
}
?>