<?php
include_once realpath(dirname(__FILE__) . "/../class/base.php");

class Materia extends Base {
    protected $id;
    protected $nombre;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
?>
