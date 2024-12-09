<?php
/* Lo que me permitirá hacer este archivo es formar arreglos de ciertas tablas para ser mostradas en un select posteriormente */
include_once realpath(dirname(__FILE__) . "/../model/basedatos.php");

class listas extends BaseDatos
{
    // Función para obtener todas las rutas en formato de opciones HTML
    public function getRoutetable()
    {
        $sql = "SELECT * FROM routes order by id";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $renglon['id'] . "</td>";
                echo "<td>" . $renglon['nombre'] . "</td>";
                echo "<td>" . $renglon['coordinates'] . "</td>";
                echo "<td>
                <a href='./../controller/update/editar_rutas.php?id=" . $renglon['id'] . "' class='btn-edit'><i class='bi bi-pencil-fill'></i></a> 
                <a href='./../controller/delete/eliminar_ruta.php?id=" . $renglon['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' class='btn-delete'><i class='bi bi-trash-fill'></i> </a>
              </td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10000000000'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
            }
        }


        $con->close();
    }

    public function usuarios_disponibles()
    {
        $sql = "SELECT * FROM usuario order by id_usuario";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // 'id_usuario`, `usuario`, `contraseña`, `ubicacion`, `nombre`, `apellido`, `edad`, `telefono`, `correo`, `foto`, `tipo`
                echo "<tr>";
                echo "<td>" . $renglon['id_usuario'] . "</td>";
                echo "<td>" . $renglon['usuario'] . "</td>";
                // echo "<td>" . md5($renglon['contraseña']) . "</td>";

                echo "<td>" . $renglon['ubicacion'] . "</td>";
                echo "<td>" . $renglon['nombre'] . " " . $renglon['apellido'] . "</td>";

                // echo "<td>" . $renglon['edad'] . "</td>";
                // echo "<td>" . $renglon['telefono'] . "</td>";

                // echo "<td>" . $renglon['correo'] . "</td>";
                // echo "<td>" . $renglon['foto'] . "</td>";
                echo "<td>" . $renglon['tipo'] . "</td>";
                echo "<td class='actions'>
                <a href='consol.php?id=" . $renglon['id_usuario'] . "' class='btn-eye'><i class='bi bi-eye'></i></a> 
                <a href='./../controller/update/editar_usuario.php?id=" . $renglon['id_usuario'] . "' class='btn-edit'><i class='bi bi-pencil-fill'></i></a> 
                <a href='./../controller/delete/eliminar_usuarios.php?id=" . $renglon['id_usuario'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' class='btn-delete'><i class='bi bi-trash-fill'></i></a>
              </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='1000000'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
            }
        }


        $con->close();
    }
    public function lugares_disponibles()
    {
        $sql = "SELECT * FROM lugares";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // `id_lugar`, `nombre`, `favoritos`, `coordenadas`, `tipo`
                echo "<tr>";
                echo "<td>" . $renglon['id_lugar'] . "</td>";
                echo "<td>" . $renglon['nombre'] . "</td>";
                echo "<td>" . $renglon['favoritos'] . "</td>";
                echo "<td>" . $renglon['coordenadas'] . "</td>";
                echo "<td>" . $renglon['tipo'] . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $renglon['id_lugar'] . "' class='btn-edit'><i class='bi bi-pencil-fill'></i></a>  
                        <a href='eliminar.php?id=" . $renglon['id_lugar'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'class='btn-delete'><i class='bi bi-trash-fill'></i></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='100000000'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
            }
        }


        $con->close();
    }



    public function soporte_list()
    {
        // SQL con JOIN para obtener el nombre del usuario
        $sql = "SELECT soporte.id_soporte, soporte.tipo_problema, soporte.problema, usuario.usuario AS nombre_usuario
                FROM soporte
                JOIN usuario ON soporte.id_usuario = usuario.id_usuario";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // `id_soporte`, `tipo_problema`, `problema`, `nombre_usuario`
                echo "<tr>";
                echo "<td>" . $renglon['id_soporte'] . "</td>";
                echo "<td>" . $renglon['tipo_problema'] . "</td>";
                echo "<td>" . $renglon['problema'] . "</td>";
                echo "<td>" . $renglon['nombre_usuario'] . "</td>"; // Ahora muestra el nombre del usuario

                echo "<td>
                        <a href='./../controller/update/editar_soporte.php?id=" . $renglon['id_soporte'] . "' class='btn-edit'><i class='bi bi-pencil-fill'></i></a>  
                        <a href='./../controller/delete/eliminar_soporte.php?id=" . $renglon['id_soporte'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' class='btn-delete'><i class='bi bi-trash-fill'></i></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='100000000'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        $con->close();
    }


    public function horario_list()
    {
// SQL con JOIN para obtener el nombre de la ruta y ordenar por id_horario
        $sql = "SELECT horarios.id_horario, routes.nombre AS nombre_ruta, horarios.hora 
                FROM horarios
                JOIN routes ON horarios.id_route = routes.id
                ORDER BY horarios.id_horario";

        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // `id_horario`, `nombre_ruta`, `hora`
                echo "<tr>";
                echo "<td>" . $renglon['id_horario'] . "</td>";
                echo "<td>" . $renglon['nombre_ruta'] . "</td>"; // Ahora muestra el nombre de la ruta
                echo "<td>" . $renglon['hora'] ."</td>";
                echo "<td>
                        <a href='./../controller/update/editar_horario.php?id=" . $renglon['id_horario'] . "'class='btn-edit'><i class='bi bi-pencil-fill'></i></a>  
                        <a href='./../controller/delete/eliminar_horario.php?id=" . $renglon['id_horario'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'class='btn-delete'><i class='bi bi-trash-fill'></i></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='100000000'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        $con->close();
    }


    public function camiones_list()
    {
        // Consulta con el JOIN
        $sql = "SELECT camiones.id_camion, camiones.numero, usuario.usuario AS nombre_conductor, camiones.agencia, camiones.estado 
                FROM camiones
                JOIN usuario ON camiones.id_conductor = usuario.id_usuario";

        // Conexión a la base de datos
        $con = $this->getBD();

        // Ejecutar la consulta
        $resultado = $con->query($sql);

        // Verificar si la consulta tuvo errores
        if ($resultado === false) {
            echo "Error en la consulta: " . $con->error;
            return;  // Detenemos la ejecución si hay un error
        }

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $renglon['id_camion'] . "</td>";
                echo "<td>" . $renglon['numero'] . "</td>";
                echo "<td>" . $renglon['nombre_conductor'] . "</td>"; // Mostrar nombre del conductor
                echo "<td>" . $renglon['agencia'] . "</td>";
                echo "<td>" . $renglon['estado'] . "</td>";
                echo "<td>
                        <a href='./../controller/update/editar_camiones.php?id=" . $renglon['id_camion'] . "' class='btn-edit'><i class='bi bi-pencil-fill'></i></a>  
                        <a href='./../controller/delete/eliminar_camiones.php?id=" . $renglon['id_camion'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' class='btn-delete'><i class='bi bi-trash-fill'></i></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        $con->close();
    }



    public function perfil()
    {
        // Iniciar la sesión
        // session_start();

        // Verificar si la sesión tiene el valor de 'usuario'
        if (!isset($_SESSION['usuario'])) {
            echo "No se ha iniciado sesión correctamente.";
            return;  // Detenemos la ejecución si no hay usuario en la sesión
        }

        // Obtener el usuario logueado de la sesión
        $usuario_logueado = $_SESSION['usuario'];  // O $_SESSION['id_usuario'] si usas el ID

        // Conexión a la base de datos
        $con = $this->getBD(); // Asumimos que esta función te devuelve una conexión válida

        // Verificar que la conexión se haya realizado correctamente
        if ($con->connect_error) {
            echo "Error de conexión: " . $con->connect_error;
            return;  // Detenemos la ejecución si hay un error en la conexión
        }

        // Consulta para obtener los datos del usuario logueado
        $sql = "SELECT * FROM usuario WHERE usuario = '" . $con->real_escape_string($usuario_logueado) . "'";

        // Ejecutar la consulta
        $resultado = $con->query($sql);

        // Verificar si la consulta tuvo errores
        if ($resultado === false) {
            echo "Error en la consulta: " . $con->error;
            return;  // Detenemos la ejecución si hay un error en la consulta
        }

        // Verificar si hay resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del usuario
            $usuario = $resultado->fetch_assoc();

            // Mostrar los datos del usuario
            echo '
            <div class="profile-container">
                <div class="profile-header">
                    ' . ($usuario['foto'] ?
                '<img src="./../img/profile/' . htmlspecialchars($usuario['foto']) . '" alt="Foto de perfil" class="profile-photo">' :
                '<i class="fas fa-user-circle"></i>') . '
                </div>
                <div class="profile-details">
                    <h2>Perfil de Usuario</h2>
                    <div class="profile-item">
                        <strong>Usuario:</strong> <span>' . htmlspecialchars($usuario['usuario']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Nombre:</strong> <span>' . htmlspecialchars($usuario['nombre']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Apellido:</strong> <span>' . htmlspecialchars($usuario['apellido']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Edad:</strong> <span>' . htmlspecialchars($usuario['edad']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Teléfono:</strong> <span>' . htmlspecialchars($usuario['telefono']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Correo:</strong> <span>' . htmlspecialchars($usuario['correo']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Ubicación:</strong> <span>' . htmlspecialchars($usuario['ubicacion']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Tipo:</strong> <span>' . htmlspecialchars($usuario['tipo']) . '</span>
                    </div>
                </div>
            </div>';
        } else {
            echo "<p>No se encontraron datos o el usuario no está registrado.</p>";
        }

        // Cerrar la conexión
        $con->close();
    }



    public function consol_perfil()
    {
        // Verificar si se pasó el ID de usuario en la URL
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo "ID de usuario no proporcionado.";
            return;  // Detenemos la ejecución si no hay ID
        }

        // Obtener el ID del usuario desde la URL
        $id_usuario = $_GET['id'];  // ID pasado en la URL, por ejemplo: ?id=1

        // Conexión a la base de datos
        $con = $this->getBD(); // Asumimos que esta función te devuelve una conexión válida

        // Verificar que la conexión se haya realizado correctamente
        if ($con->connect_error) {
            echo "Error de conexión: " . $con->connect_error;
            return;  // Detenemos la ejecución si hay un error en la conexión
        }

        // Consulta para obtener los datos del usuario con el ID proporcionado
        $sql = "SELECT * FROM usuario WHERE id_usuario = '" . $con->real_escape_string($id_usuario) . "'";

        // Ejecutar la consulta
        $resultado = $con->query($sql);

        // Verificar si la consulta tuvo errores
        if ($resultado === false) {
            echo "Error en la consulta: " . $con->error;
            return;  // Detenemos la ejecución si hay un error en la consulta
        }

        // Verificar si hay resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del usuario
            $usuario = $resultado->fetch_assoc();

            // Mostrar los datos del usuario
            echo '
            <div class="profile-container">
                <div class="profile-header">
                    ' . ($usuario['foto'] ?
                '<img src="./../img/profile/' . htmlspecialchars($usuario['foto']) . '" alt="Foto de perfil" class="profile-photo">' :
                '<i class="fas fa-user-circle"></i>') . '
                </div>
                <div class="profile-details">
                    <h2>Perfil de Usuario</h2>
                    <div class="profile-item">
                        <strong>Usuario:</strong> <span>' . htmlspecialchars($usuario['usuario']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Nombre:</strong> <span>' . htmlspecialchars($usuario['nombre']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Apellido:</strong> <span>' . htmlspecialchars($usuario['apellido']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Edad:</strong> <span>' . htmlspecialchars($usuario['edad']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Teléfono:</strong> <span>' . htmlspecialchars($usuario['telefono']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Correo:</strong> <span>' . htmlspecialchars($usuario['correo']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Ubicación:</strong> <span>' . htmlspecialchars($usuario['ubicacion']) . '</span>
                    </div>
                    <div class="profile-item">
                        <strong>Tipo:</strong> <span>' . htmlspecialchars($usuario['tipo']) . '</span>
                    </div>
                </div>
            </div>';
        } else {
            echo "<p>No se encontró el perfil del usuario.</p>";
        }

        // Cerrar la conexión
        $con->close();
    }




    public function camiones_conductoresid()
    {
        // Consulta con el JOIN para filtrar solo los conductores
        $sql = "SELECT * FROM `usuario` WHERE `tipo` = 'conductor'";

        // Conexión a la base de datos
        $con = $this->getBD();

        // Ejecutar la consulta
        $resultado = $con->query($sql);

        // Verificar si la consulta tuvo errores
        if ($resultado === false) {
            echo "Error en la consulta: " . $con->error;
            return;  // Detenemos la ejecución si hay un error
        }

        if ($resultado->num_rows > 0) {
            echo "<label for='id_conductor'>ID del Conductor:</label>
            <select name='id_conductor' id='id_conductor' required>";
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<option value='" . $renglon['id_usuario'] . "'>" . $renglon['nombre'] . " " . $renglon['apellido'] . "</option>";
            }
            echo " </select>";
        } else {
            echo "No se encontraron conductores.";
        }

        $con->close();
    }


    public function soporte_usuariosid()
    {
        // Consulta con el JOIN para filtrar solo los conductores
        $sql = "SELECT * FROM `usuario` order by id_usuario";

        // Conexión a la base de datos
        $con = $this->getBD();

        // Ejecutar la consulta
        $resultado = $con->query($sql);

        // Verificar si la consulta tuvo errores
        if ($resultado === false) {
            echo "Error en la consulta: " . $con->error;
            return;  // Detenemos la ejecución si hay un error
        }

        if ($resultado->num_rows > 0) {
            echo "<label for='id_usuario'>ID del Usuario:</label>
            <select name='id_usuario' id='id_usuario' required>";
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<option value='" . $renglon['id_usuario'] . "'>" . $renglon['nombre'] . " " . $renglon['apellido'] .  " [".$renglon['usuario']."]</option>";
            }
            echo " </select>";
        } else {
            echo "No se encontraron conductores.";
        }

        $con->close();
    }




    public function horarios_routesid()
    {
        // Consulta con el JOIN para filtrar solo los conductores
        $sql = "SELECT * FROM `routes`";

        // Conexión a la base de datos
        $con = $this->getBD();

        // Ejecutar la consulta
        $resultado = $con->query($sql);

        // Verificar si la consulta tuvo errores
        if ($resultado === false) {
            echo "Error en la consulta: " . $con->error;
            return;  // Detenemos la ejecución si hay un error
        }

        if ($resultado->num_rows > 0) {

            echo "<label for='id_route'>ID de la Ruta:</label>
            <select name='id_route' id='id_route' required>";
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<option value='" . $renglon['id'] . "'>" . $renglon['nombre'] . "</option>";
            }
            echo " </select>";
        } else {
            echo "No se encontraron conductores.";
        }

        $con->close();
    }
}
