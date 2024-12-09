<?php
class Rute
{
    private int $id;
    private string $name;
    private float $location;
    private bool $favorite;

    public function __construct(string $name,float $location, bool $favorite)
    {
        $this->name = $name;
        $this->location = $location;
        $this->favorite = $favorite;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getLocation(): string
    {
        return $this->location;
    }
    public function getFavorite(): bool
    {
        return $this->favorite;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setLocation(float $location): void
    {
        $this->location = $location;
    }
    public function setFavorite(bool $favorite): void
    {
        $this->favorite = $favorite;
    }

}
?>