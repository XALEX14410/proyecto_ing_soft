<?php
include_once realpath(dirname(__FILE__)."/../class/camiones.php");
include_once realpath(dirname(__FILE__)."/../model/basedatos.php");

class bd_camion extends BaseDatos {
    // Agrega un nuevo camión
    public function agrega_camion($datos_camion) {
        $sql = "INSERT INTO `camiones` ( `numero`, `id_conductor`, `agencia`, `estado`) 
                VALUES (
                    '".$datos_camion->getNumero()."', 
                    '".$datos_camion->getIdConductor()."', 
                    '".$datos_camion->getAgencia()."', 
                    '".$datos_camion->getEstado()."'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }
    public function verificar_camion_existente($numero, $id_conductor) {
        $sql_check = "SELECT COUNT(*) AS count FROM `camiones` WHERE `numero` = '".$numero."' AND `id_conductor` = '".$id_conductor."'";
        $con = $this->getBD();
        $resultado_check = $con->query($sql_check);
        $row = $resultado_check->fetch_assoc();
        $con->close();
    
        if ($row['count'] > 0) {
            return "Error: La combinación de conductor y número de camión ya existe.";
        }
        
        return "OK"; // Si no existe, devolver "OK"
    }
    
    // Genero mi lista de camiones
    public function lista_camiones() {
        $lista_camiones = array();
        $sql = "SELECT * FROM `camiones` ORDER BY id_camion";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_tabla = new camiones($renglon);
                $lista_camiones[$i] = $dato_tabla; // Almacena en el array
            }
        }
        $con->close();
        return $lista_camiones;
    }

    // Busca un camión por ID
    public function busca_camion($id_camion) {
        $datos_del_elemento = array();
        if ($id_camion > 0) {
            $sql = "SELECT * FROM `camiones` WHERE id_camion = ".$id_camion;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_elemento = new camiones($renglon);
                    $datos_del_elemento[$i] = $dato_elemento;
                }
            }
            $con->close();
        } else {
            // Si no hay un ID válido, inicializamos un objeto vacío
            $dato_elemento = new camiones();
            $datos_del_elemento[0] = $dato_elemento;
        }
        return $datos_del_elemento;
    }

    // Modifico los registros en la base de datos
    public function actualiza_camion($eldato) {
        $sql = "UPDATE `camiones` SET 
                    `numero`='".$eldato->getNumero()."', 
                    `id_conductor`='".$eldato->getIdConductor()."', 
                    `agencia`='".$eldato->getAgencia()."', 
                    `estado`='".$eldato->getEstado()."' 
                WHERE `id_camion`=".$eldato->getIdCamion();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Elimino un camión
    public function elimina_camion($id_camion) {
        $sql = "DELETE FROM `camiones` WHERE id_camion = ".$id_camion;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }
}
?>
