<?php
include_once realpath(dirname(__FILE__)."/../class/base.php");

class soporte extends base {
    protected $id_soporte;
    protected $tipo_problema;
    protected $problema;
    protected $id_usuario;
    protected $solucionado;

    public function getIdSoporte() {
        return $this->id_soporte;
    }

    public function setIdSoporte($id_soporte) {
        $this->id_soporte = $id_soporte;
    }

    public function getTipoProblema() {
        return $this->tipo_problema;
    }

    public function setTipoProblema($tipo_problema) {
        $this->tipo_problema = $tipo_problema;
    }

    public function getProblema() {
        return $this->problema;
    }

    public function setProblema($problema) {
        $this->problema = $problema;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getSolucionado() {
        return $this->solucionado;
    }

    public function setSolucionado($solucionado) {
        $this->solucionado = $solucionado;
    }
}
?>
