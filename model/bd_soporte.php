<?php
include_once realpath(dirname(__FILE__)."/../class/soporte.php");
include_once realpath(dirname(__FILE__)."/../model/basedatos.php");

class bd_soporte extends BaseDatos {
    // Agrega un nuevo registro de soporte
    public function agrega_soporte($datos_soporte) {
        $sql = "INSERT INTO `soporte` (`id_soporte`, `tipo_problema`, `problema`, `id_usuario`, `solucionado`) 
                VALUES (
                    '".$datos_soporte->getIdSoporte()."', 
                    '".$datos_soporte->getTipoProblema()."', 
                    '".$datos_soporte->getProblema()."', 
                    '".$datos_soporte->getIdUsuario()."', 
                    '".$datos_soporte->getSolucionado()."'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Genero mi lista de registros de soporte
    public function lista_soporte() {
        $lista_soporte = array();
        $sql = "SELECT * FROM `soporte` ORDER BY id_soporte";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_tabla = new soporte($renglon);
                $lista_soporte[$i] = $dato_tabla; // Almacena en el array
            }
        }
        $con->close();
        return $lista_soporte;
    }
    
    // Busca un registro de soporte por ID
    public function busca_soporte($id_soporte) {
        $datos_del_elemento = array();
        if ($id_soporte > 0) {
            $sql = "SELECT * FROM `soporte` WHERE id_soporte = ".$id_soporte;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_elemento = new soporte($renglon);
                    $datos_del_elemento[$i] = $dato_elemento;
                }
            }
            $con->close();
        } else {
            // Si no hay un ID válido, inicializamos un objeto vacío
            $dato_elemento = new soporte();
            $datos_del_elemento[0] = $dato_elemento;
        }
        return $datos_del_elemento;
    }

    // Modifico un registro de soporte
    public function actualiza_soporte($eldato) {
        $sql = "UPDATE `soporte` SET 
                    `tipo_problema`='".$eldato->getTipoProblema()."', 
                    `problema`='".$eldato->getProblema()."', 
                    `id_usuario`='".$eldato->getIdUsuario()."', 
                    `solucionado`='".$eldato->getSolucionado()."' 
                WHERE `id_soporte`=".$eldato->getIdSoporte();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Elimina un registro de soporte
    public function elimina_soporte($id_soporte) {
        $sql = "DELETE FROM `soporte` WHERE id_soporte = ".$id_soporte;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }
}
?>
