<?php
class Schedule {
    private $id;
    private float $hour;
    private Rute $ruta;

    public function __construct(Float $hour, Rute $ruta)
    {
        $this->hour = $hour;
        $this->ruta = $ruta;
    }
    public function getId() : Int
    {
        return $this->id;
    }
    public function getHour() : Float
    {
        return $this->hour;
    }
    public function getRute() : Rute
    {
        return $this->ruta;
    }
    public function setHour(Float $hour): void
    {
        $this->hour = $hour;
    }
    public function setRute(Rute $ruta): void
    {
        $this->ruta = $ruta;
    }
}