<?php
class PlaceDTO {
    public string $name;
    public bool $favorite;
    public float $coordinates;
    public string $type;

    public function __construct(string $name, bool $favorite, float $coordinates, string $type) {
        $this->name = $name;
        $this->favorite = $favorite;
        $this->coordinates = $coordinates;
        $this->type = $type;
    }
}