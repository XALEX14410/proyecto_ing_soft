<?php
include_once realpath(dirname(__FILE__) . "/../class/pago.php");
include_once realpath(dirname(__FILE__) . "/../model/basedatos.php");

class bd_pago extends BaseDatos {
    // Agregar un nuevo pago
    public function agrega_pago($datos_pago) {
        $sql = "INSERT INTO `pagos`(`id`, `monto`, `fecha`) VALUES (
                    '" . $datos_pago->getid() . "', 
                    '" . $datos_pago->getmonto() . "', 
                    '" . $datos_pago->getfecha() . "'
                )";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }

    // Obtener la lista de pagos
    public function lista_pago() {
        $lista_pago = array();
        $sql = "SELECT * FROM `pagos` ORDER BY id";
        $con = $this->getBD();
        $resultado = $con->query($sql);
        
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $renglon = $resultado->fetch_assoc();
                $dato_pago = new Pagos($renglon);
                $dato_pago->setid($dato_pago->getid());
                $dato_pago->setmonto($dato_pago->getmonto());
                $dato_pago->setfecha($dato_pago->getfecha());

                $lista_pago[$i] = $dato_pago;
            }
        }
        $con->close();
        return $lista_pago;
    }

    // Buscar un pago por ID
    public function busca_pago($id) {
        $datos_del_elemento = array();
        if ($id > 0) {
            $sql = "SELECT * FROM `pagos` WHERE id=" . $id;
            $con = $this->getBD();
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $renglon = $resultado->fetch_assoc();
                    $dato_pago = new Pagos($renglon);
                    $dato_pago->setid($dato_pago->getid());
                    $dato_pago->setmonto($dato_pago->getmonto());
                    $dato_pago->setfecha($dato_pago->getfecha());

                    $datos_del_elemento[$i] = $dato_pago;
                }
            }
            $con->close();
        } else {
            $dato_pago = new Pagos();
            $dato_pago->setid($dato_pago->getid());
            $dato_pago->setmonto($dato_pago->getmonto());
            $dato_pago->setfecha($dato_pago->getfecha());

            $datos_del_elemento[0] = $dato_pago;
        }

        return $datos_del_elemento;
    }

    // Actualizar los datos de un pago
    public function actualiza_pago($eldato) {
        $sql = "UPDATE `pagos` SET 
                    `id`='" . $eldato->getid() . "', 
                    `monto`='" . $eldato->getmonto() . "', 
                    `fecha`='" . $eldato->getfecha() . "'
                WHERE `id`=" . $eldato->getid();
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }

    // Eliminar un pago
    public function elimina_pago($id) {
        $sql = "DELETE FROM `pagos` WHERE id=" . $id;
        $con = $this->getBD();
        $resultado = $con->query($sql);
        $con->close();
        return $resultado;
    }
}
?>
