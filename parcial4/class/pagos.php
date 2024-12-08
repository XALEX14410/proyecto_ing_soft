<?php
include_once realpath(dirname(__FILE__) . "/../class/base.php");

class Pagos extends Base {
    protected $id;
    protected $monto;
    protected $fecha;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMonto() {
        return $this->monto;
    }

    public function setMonto($monto) {
        $this->monto = $monto;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}
?>
