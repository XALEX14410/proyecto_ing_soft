<?php
include_once realpath(dirname(__FILE__) . "/../model/basedatos.php");

class listas extends BaseDatos
{
    // Obtener todos los alumnos
    public function getAlumnos()
    {
        $sql = "SELECT * FROM alumnos";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $renglon['id'] . "</td>";
                echo "<td>" . $renglon['nombre'] . "</td>";
                echo "<td>" . $renglon['edad'] . "</td>";
                echo "<td>
                        <a href='./../controller/update/editar_alumno.php?id=" . $renglon['id'] . "'>Editar</a> 
                        <a href='./../controller/delete/eliminar_alumno.php?id=" . $renglon['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        $con->close();
    }

    // Obtener todas las materias
    public function getMaterias()
    {
        $sql = "SELECT `id`, `nombre`, `creditos` FROM `materias` ";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $renglon['id'] . "</td>";
                echo "<td>" . $renglon['nombre'] . "</td>";
                echo "<td>" . $renglon['creditos'] . "</td>";
                echo "<td>
                        <a href='./../controller/update/editar_materia.php?id=" . $renglon['id'] . "'>Editar</a> 
                        <a href='./../controller/delete/eliminar_materia.php?id=" . $renglon['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        $con->close();
    }

    // Obtener todos los pagos
    public function getPagos()
    {
        $sql = "SELECT `id`, `alumno_id`, `monto`, `fecha` FROM `pagos`";
        $con = $this->getBD();
        $resultado = $con->query($sql);

        echo "<tbody>";
        if ($resultado->num_rows > 0) {
            while ($renglon = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $renglon['id'] . "</td>";
                echo "<td>" . $renglon['alumno_id'] . "</td>";
                echo "<td>" . $renglon['monto'] . "</td>";
                echo "<td>" . $renglon['fecha'] . "</td>";
                echo "<td>
                        <a href='./../controller/update/editar_pago.php?id=" . $renglon['id'] . "'>Editar</a> 
                        <a href='./../controller/delete/eliminar_pago.php?id=" . $renglon['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron datos.</td></tr>";
        }
        echo "</tbody>";

        $con->close();
    }
}
?>
