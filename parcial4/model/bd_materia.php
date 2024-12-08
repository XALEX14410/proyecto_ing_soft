<?php
include_once realpath(dirname(__FILE__) . "/../class/materia.php");
include_once realpath(dirname(__FILE__) . "/../model/basedatos.php");

class bd_materia extends BaseDatos {
    // Agregar una nueva materia
    public function agrega_materia($datos_materia) {
        $sql = "INSERT INTO `materias`(`id`, `nombre`) VALUES (
                    '" . $datos_materia->getid() . "', 
                    '" . $datos_materia->getnombre() . "'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }

    // Obtener la lista de materias
    public function lista_materia() {
        $lista_materia = array();
        $sql = "SELECT * FROM `materias` ORDER BY id";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_materia = new Materia($renglon);
                $dato_materia->setid($dato_materia->getid());
                $dato_materia->setnombre($dato_materia->getnombre());

                $lista_materia[$i] = $dato_materia;
            }
        }
        $con->close();
        return $lista_materia;
    }

    // Buscar una materia por ID
    public function busca_materia($id) {
        $datos_del_elemento = array();
        if ($id > 0) {
            $sql = "SELECT * FROM `materias` WHERE id=" . $id;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_materia = new Materia($renglon);
                    $dato_materia->setid($dato_materia->getid());
                    $dato_materia->setnombre($dato_materia->getnombre());

                    $datos_del_elemento[$i] = $dato_materia;
                }
            }
            $con->close();
        } else {
            $dato_materia = new Materia();
            $dato_materia->setid($dato_materia->getid());
            $dato_materia->setnombre($dato_materia->getnombre());

            $datos_del_elemento[0] = $dato_materia;
        }

        return $datos_del_elemento;
    }

    // Actualizar los datos de una materia
    public function actualiza_materia($eldato) {
        $sql = "UPDATE `materias` SET 
                    `id`='" . $eldato->getid() . "', 
                    `nombre`='" . $eldato->getnombre() . "'
                WHERE `id`=" . $eldato->getid();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }

    // Eliminar una materia
    public function elimina_materia($id) {
        $sql = "DELETE FROM `materias` WHERE id=" . $id;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }
}
?>
