<?php
/* Lo que me permitirá hacer este archivo es formar arreglos de ciertas tablas para ser mostradas en un select posteriormente */
include_once realpath(dirname(__FILE__) . "/../model/basedatos.php");

class listas extends BaseDatos
{
    // Función para obtener todas las rutas en formato de opciones HTML
    public function getRoutetable()
    {
        $sql = "SELECT * FROM routes";
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
                        <a href='editar.php?id=" . $renglon['id'] . "'>Editar</a> 
                        <a href='eliminar.php?id=" . $renglon['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
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
        $sql = "SELECT * FROM usuario";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // 'id_usuario`, `usuario`, `contraseña`, `ubicacion`, `nombre`, `apellido`, `edad`, `telefono`, `correo`, `foto`, `tipo`
                echo "<tr>";
                echo "<td>" . $renglon['id_usuario'] . "</td>";
                echo "<td>" . $renglon['usuario'] . "</td>";
                echo "<td>" .md5( $renglon['contraseña']) . "</td>";

                echo "<td>" . $renglon['ubicacion'] . "</td>";
                echo "<td>" . $renglon['nombre'] . " " . $renglon['apellido'] . "</td>";

                echo "<td>" . $renglon['edad'] . "</td>";
                echo "<td>" . $renglon['telefono'] . "</td>";

                // echo "<td>" . $renglon['correo'] . "</td>";
                // echo "<td>" . $renglon['foto'] . "</td>";
                // echo "<td>" . $renglon['tipo'] . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $renglon['id_usuario'] . "'>Editar</a> 
                        <a href='eliminar.php?id=" . $renglon['id_usuario'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
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
                        <a href='editar.php?id=" . $renglon['id_lugar'] . "'>Editar</a>  
                        <a href='eliminar.php?id=" . $renglon['id_lugar'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
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
        $sql = "SELECT * FROM `soporte`";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                //`id_soporte`, `tipo_problema`, `problema`, `id_usuario'
                echo "<tr>";
                echo "<td>" . $renglon['id_soporte'] . "</td>";
                echo "<td>" . $renglon['tipo_problema'] . "</td>";
                echo "<td>" . $renglon['problema'] . "</td>";
                echo "<td>" . $renglon['id_usuario'] . "</td>";

                echo "<td>
                        <a href='editar.php?id=" . $renglon['id_soporte'] . "'>Editar</a>  
                        <a href='eliminar.php?id=" . $renglon['id_soporte'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
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


    public function horario_list()
    {
        $sql = "SELECT * FROM `horarios`";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // `id_horario`, `id_route`, `hora`
                echo "<tr>";
                echo "<td>" . $renglon['id_horario'] . "</td>";
                echo "<td>" . $renglon['id_route'] . "</td>";
                echo "<td>" . $renglon['hora'] . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $renglon['id_horario'] . "'>Editar</a>  
                        <a href='eliminar.php?id=" . $renglon['id_horario'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
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

    public function camiones_list()
    {
        $sql = "SELECT * FROM `camiones`";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                // id_camion`, `numero`, `id_conductor`, `agencia`, `estado`
                echo "<tr>";
                echo "<td>" . $renglon[' id_camion'] . "</td>";
                echo "<td>" . $renglon['numero'] . "</td>";
                echo "<td>" . $renglon['id_conductor'] . "</td>";
                echo "<td>" . $renglon['agencia'] . "</td>";
                echo "<td>" . $renglon['estado'] . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $renglon[' id_camion'] . "'>Editar</a>  
                        <a href='eliminar.php?id=" . $renglon[' id_camion'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
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
}
