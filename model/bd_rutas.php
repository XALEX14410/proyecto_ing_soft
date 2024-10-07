<?php
    include_once realpath(dirname(__FILE__)."/../class/rutas.php");
    include_once realpath(dirname(__FILE__)."/../model/basedatos.php");

    class bd_ruta extends BaseDatos {
        // Agrega nueva dbo_usuarios
        Public function agrega_dbo_dbo_usuarios($datos_dbo_usuarios) {
            $sql = "INSERT INTO `routes`(`id`, `nombre`, `coordinates`) VALUES(
                        '".$datos_dbo_usuarios->getid()."', ". 
                        "'".$datos_dbo_usuarios->getnombre()."', ".
                        "'".$datos_dbo_usuarios->getdescripcion()."', ".
 
            ")";
            $con = $this->getBD();
            $resultado = $con->query($sql);
            $con->close();
        }

        // Genero mi lista de dbo_dbo_usuarios
        public function lista_ruta() {
            $lista_ruta = array();
            $sql = "SELECT * FROM `routes` order by id";
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows>0) { // Quiere decir que lo encontro
                for($i=0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                  
                    $dato_tabla = new rutas($renglon);
                    $dato_tabla->setid($dato_tabla->getid());
                    $dato_tabla->setnombre($dato_tabla->getnombre());
                    $dato_tabla->setcoordinates($dato_tabla->getcoordinates());

                    


                    $lista_dbo_dbo_usuarios[$i] = $dato_tabla;
                }// end for
            }
            $con->close();
            return $lista_dbo_dbo_usuarios;
        }

        // Busco a dbo_dbo_usuarios
        public function busca_dbo_usuarios($id) {
            $datos_del_elemento = array();
            if ($id>0) {
                $sql = "select * from dbo_dbo_usuarios where id=".$id;
                $con = $this->getBD();
                $resultado = $con->query($sql);
                if ($resultado->num_rows>0) { // Quiere decir que lo encontro 
                    for($i=0; $i < $resultado->num_rows; $i++) {
                        $renglon = $resultado->fetch_assoc();
                        $dato_elemento = new rutas($renglon);
                        $dato_elemento->setid($dato_elemento->getid());
                        $dato_elemento->setnombre($dato_elemento->getnombre());
                        $dato_elemento->setcoordinates($dato_elemento->getcoordinates());

                    

                        $datos_del_elemento[$i] = $dato_elemento;
                    }// end for
                }
                $con->close();
            }

            else {
                    $dato_elemento = new rutas();
                    $dato_elemento->setid($dato_elemento->getid());
                    $dato_elemento->setnombre($dato_elemento->getnombre());
                    $dato_elemento->setcoordinates($dato_elemento->getcoordinates());

                $datos_del_elemento[0] = $dato_elemento;
            }

            return $datos_del_elemento;
        }

        // Modifico los registros en la base de datos
        public function actualiza_dbo_dbo_usuarios($eldato) {
            $sql = "update dbo_dbo_usuarios set ".
                        "id='".$eldato->getid()."', ".
                        "nombre='".$eldato->getnombre()."', ".
                        "coordinates='".$eldato->getcoordinates()."', ".
                        
                        
                               
            "where dbo_dbo_usuarios=".$eldato->getid();
            $con = $this->getBD();
            $resultado = $con->query($sql);
            $con->close();
        }

        // Elimino dbo_dbo_usuarios
        public function elimina_dbo_dbo_usuarios($id) {
            $sql = "delete from dbo_dbo_usuarios where id=".$id;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            $con->close();
        }
    }
?>