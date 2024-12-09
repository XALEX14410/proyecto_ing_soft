<?php
include_once realpath(dirname(__FILE__)."/../class/base.php");

class horarios extends base {
    protected $id_horario;
    protected $id_route;
    protected $hora;

    public function getIdHorario() {
        return $this->id_horario;
    }

    public function setIdHorario($id_horario) {
        $this->id_horario = $id_horario;
    }

    public function getIdRoute() {
        return $this->id_route;
    }

    public function setIdRoute($id_route) {
        $this->id_route = $id_route;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
}
?>
