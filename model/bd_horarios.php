<?php
include_once realpath(dirname(__FILE__)."/../class/horarios.php");
include_once realpath(dirname(__FILE__)."/../model/basedatos.php");

class bd_horario extends BaseDatos {
    // Agrega un nuevo horario
    public function agrega_horario($datos_horario) {
        $sql = "INSERT INTO `horarios` ( `id_route`, `hora`) 
                VALUES (
     
                    '".$datos_horario->getIdRoute()."', 
                    '".$datos_horario->getHora()."'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Genero mi lista de horarios
    public function lista_horarios() {
        $lista_horarios = array();
        $sql = "SELECT * FROM `horarios` ORDER BY id_horario";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_tabla = new horarios($renglon);
                $lista_horarios[$i] = $dato_tabla; // Almacena en el array
            }
        }
        $con->close();
        return $lista_horarios;
    }

    // Busca un horario por ID
    public function busca_horario($id_horario) {
        $datos_del_elemento = array();
        if ($id_horario > 0) {
            $sql = "SELECT * FROM `horarios` WHERE id_horario = ".$id_horario;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_elemento = new horarios($renglon);
                    $datos_del_elemento[$i] = $dato_elemento;
                }
            }
            $con->close();
        } else {
            // Si no hay un ID válido, inicializamos un objeto vacío
            $dato_elemento = new horarios();
            $datos_del_elemento[0] = $dato_elemento;
        }
        return $datos_del_elemento;
    }

    // Modifico los registros en la base de datos
    public function actualiza_horario($eldato) {
        $sql = "UPDATE `horarios` SET 
                    `id_route`='".$eldato->getIdRoute()."', 
                    `hora`='".$eldato->getHora()."' 
                WHERE `id_horario`=".$eldato->getIdHorario();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Elimino un horario
    public function elimina_horario($id_horario) {
        $sql = "DELETE FROM `horarios` WHERE id_horario = ".$id_horario;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }
}
?>
