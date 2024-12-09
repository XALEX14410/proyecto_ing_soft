<?php
include_once realpath(dirname(__FILE__)."/../class/base.php");

class camiones extends base {
    protected $id_camion;
    protected $numero;
    protected $id_conductor;
    protected $agencia;
    protected $estado;

    public function getIdCamion() {
        return $this->id_camion;
    }

    public function setIdCamion($id_camion) {
        $this->id_camion = $id_camion;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getIdConductor() {
        return $this->id_conductor;
    }

    public function setIdConductor($id_conductor) {
        $this->id_conductor = $id_conductor;
    }

    public function getAgencia() {
        return $this->agencia;
    }

    public function setAgencia($agencia) {
        $this->agencia = $agencia;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}
?>
