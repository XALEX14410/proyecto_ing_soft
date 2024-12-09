<?php
class RouteDTO {
    public string $name;
    public float $location;
    public bool $favorite;

    public function __construct(string $name, float $location, bool $favorite) {
        $this->name = $name;
        $this->location = $location;
        $this->favorite = $favorite;
    }
}