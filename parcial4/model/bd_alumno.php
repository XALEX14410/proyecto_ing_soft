<?php
include_once realpath(dirname(__FILE__) . "/../class/alumno.php");
include_once realpath(dirname(__FILE__) . "/../model/basedatos.php");

class bd_alumno extends BaseDatos {
    // Agregar un nuevo alumno
    public function agrega_alumno($datos_alumno) {
        $sql = "INSERT INTO `alumnos`(`id`, `nombre`, `edad`) VALUES (
                    '" . $datos_alumno->getid() . "', 
                    '" . $datos_alumno->getnombre() . "', 
                    '" . $datos_alumno->getedad() . "'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }

    // Obtener la lista de alumnos
    public function lista_alumno() {
        $lista_alumno = array();
        $sql = "SELECT * FROM `alumnos` ORDER BY id";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_alumno = new Alumno($renglon);
                $dato_alumno->setid($dato_alumno->getid());
                $dato_alumno->setnombre($dato_alumno->getnombre());
                $dato_alumno->setedad($dato_alumno->getedad());

                $lista_alumno[$i] = $dato_alumno;
            }
        }
        $con->close();
        return $lista_alumno;
    }

    // Buscar un alumno por ID
    public function busca_alumno($id) {
        $datos_del_elemento = array();
        if ($id > 0) {
            $sql = "SELECT * FROM `alumnos` WHERE id=" . $id;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_alumno = new Alumno($renglon);
                    $dato_alumno->setid($dato_alumno->getid());
                    $dato_alumno->setnombre($dato_alumno->getnombre());
                    $dato_alumno->setedad($dato_alumno->getedad());

                    $datos_del_elemento[$i] = $dato_alumno;
                }
            }
            $con->close();
        } else {
            $dato_alumno = new Alumno();
            $dato_alumno->setid($dato_alumno->getid());
            $dato_alumno->setnombre($dato_alumno->getnombre());
            $dato_alumno->setedad($dato_alumno->getedad());

            $datos_del_elemento[0] = $dato_alumno;
        }

        return $datos_del_elemento;
    }

    // Actualizar los datos de un alumno
    public function actualiza_alumno($eldato) {
        $sql = "UPDATE `alumnos` SET 
                    `id`='" . $eldato->getid() . "', 
                    `nombre`='" . $eldato->getnombre() . "', 
                    `edad`='" . $eldato->getedad() . "'
                WHERE `id`=" . $eldato->getid();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }

    // Eliminar un alumno
    public function elimina_alumno($id) {
        $sql = "DELETE FROM `alumnos` WHERE id=" . $id;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }
}
?>
