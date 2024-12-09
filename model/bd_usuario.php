<?php
include_once realpath(dirname(__FILE__)."/../class/usuario.php");
include_once realpath(dirname(__FILE__)."/../model/basedatos.php");

class bd_usuario extends BaseDatos {
    // Agrega un nuevo usuario
    public function agrega_usuario($datos_usuario) {
        $sql = "INSERT INTO `usuario` (`id_usuario`, `usuario`, `contraseña`, `ubicacion`, `nombre`, `apellido`, `edad`, `telefono`, `correo`, `foto`, `tipo`) 
                VALUES (
                    '".$datos_usuario->getIdUsuario()."', 
                    '".$datos_usuario->getUsuario()."', 
                    '".$datos_usuario->getContraseña()."', 
                    '".$datos_usuario->getUbicacion()."', 
                    '".$datos_usuario->getNombre()."', 
                    '".$datos_usuario->getApellido()."', 
                    '".$datos_usuario->getEdad()."', 
                    '".$datos_usuario->getTelefono()."', 
                    '".$datos_usuario->getCorreo()."', 
                    '".$datos_usuario->getFoto()."', 
                    '".$datos_usuario->getTipo()."'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Genero mi lista de usuarios
    public function lista_usuarios() {
        $lista_usuarios = array(); // Inicializar la variable correctamente
        $sql = "SELECT * FROM `usuario` ORDER BY id_usuario";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        if ($resultado->num_rows > 0) { // Quiere decir que lo encontró
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_tabla = new usuario($renglon);
                $lista_usuarios[$i] = $dato_tabla; // Almacena en el array
            }
        }
        $con->close();
        return $lista_usuarios;
    }

    // Busca un usuario por ID
    public function busca_usuario($id_usuario) {
        $datos_del_elemento = array();
        if ($id_usuario > 0) {
            $sql = "SELECT * FROM `usuario` WHERE id_usuario = ".$id_usuario;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) { // Quiere decir que lo encontró
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_elemento = new usuario($renglon);
                    $datos_del_elemento[$i] = $dato_elemento;
                }
            }
            $con->close();
        } else {
            // Si no hay un ID válido, inicializamos un objeto vacío
            $dato_elemento = new usuario();
            $datos_del_elemento[0] = $dato_elemento;
        }
        return $datos_del_elemento;
    }

    // Modifico los registros en la base de datos
    public function actualiza_usuario($eldato) {
        $sql = "UPDATE `usuario` SET 
                    `usuario`='".$eldato->getUsuario()."', 
                    `contraseña`='".$eldato->getContraseña()."', 
                    `ubicacion`='".$eldato->getUbicacion()."', 
                    `nombre`='".$eldato->getNombre()."', 
                    `apellido`='".$eldato->getApellido()."', 
                    `edad`='".$eldato->getEdad()."', 
                    `telefono`='".$eldato->getTelefono()."', 
                    `correo`='".$eldato->getCorreo()."', 
                    `foto`='".$eldato->getFoto()."', 
                    `tipo`='".$eldato->getTipo()."' 
                WHERE `id_usuario`=".$eldato->getIdUsuario();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }

    // Elimino un usuario
    public function elimina_usuario($id_usuario) {
        $sql = "DELETE FROM `usuario` WHERE id_usuario = ".$id_usuario;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
    }
}
?>
