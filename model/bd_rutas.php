<?php
include_once realpath(dirname(__FILE__)."/../class/rutas.php");
include_once realpath(dirname(__FILE__)."/../model/basedatos.php");

class bd_ruta extends BaseDatos {
    // Agrega nueva ruta
    public function agrega_rutas($datos_dbo_usuarios) {
        $sql = "INSERT INTO `routes`(`nombre`, `coordinates`) VALUES (
                    
                    '".$datos_dbo_usuarios->getnombre()."', 
                    '".$datos_dbo_usuarios->getcoordinates()."'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Genero mi lista de rutas
    public function lista_ruta() {
        $lista_dbo_dbo_usuarios = array(); // Inicializar la variable correctamente
        $sql = "SELECT * FROM `routes` ORDER BY id";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        if ($resultado->num_rows > 0) { // Quiere decir que lo encontró
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_tabla = new rutas($renglon);
                $dato_tabla->setid($dato_tabla->getid());
                $dato_tabla->setnombre($dato_tabla->getnombre());
                $dato_tabla->setcoordinates($dato_tabla->getcoordinates());
                $lista_dbo_dbo_usuarios[$i] = $dato_tabla; // Almacena en el array
            }
        }
        $con->close();
        return $lista_dbo_dbo_usuarios;
    }

    // Busco una ruta por ID
    public function busca_dbo_usuarios($id) {
        $datos_del_elemento = array();
        if ($id > 0) {
            $sql = "SELECT * FROM `routes` WHERE id = ".$id;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) { // Quiere decir que lo encontró
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_elemento = new rutas($renglon);
                    $dato_elemento->setid($dato_elemento->getid());
                    $dato_elemento->setnombre($dato_elemento->getnombre());
                    $dato_elemento->setcoordinates($dato_elemento->getcoordinates());
                    $datos_del_elemento[$i] = $dato_elemento;
                }
            }
            $con->close();
        } else {
            // Si no hay un ID válido, inicializamos un objeto vacío
            $dato_elemento = new rutas();
            $dato_elemento->setid(0);
            $dato_elemento->setnombre("Sin nombre");
            $dato_elemento->setcoordinates("Sin coordenadas");
            $datos_del_elemento[0] = $dato_elemento;
        }
        return $datos_del_elemento;
    }

    // Modifico los registros en la base de datos
    public function actualiza_dbo_dbo_usuarios($eldato) {
        $sql = "UPDATE `routes` SET ".
                    "nombre='".$eldato->getnombre()."', ".
                    "coordinates='".$eldato->getcoordinates()."' ".
               "WHERE id=".$eldato->getid();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Elimino una ruta
    public function elimina_rutas($id) {
        $sql = "DELETE FROM `routes` WHERE id = ".$id;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }
}
?>
