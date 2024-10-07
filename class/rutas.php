<?php
    include_once realpath(dirname(__FILE__)."/../class/base.php");

    class rutas extends base {
	protected $id;
	protected $nombre;
	protected $coordinates;



    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getcoordinates() {
        return $this->coordinates;
    }

    public function setcoordinates($coordinates) {
        $this->coordinates = $coordinates;
    }
   
    }
?>