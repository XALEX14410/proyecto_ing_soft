<?php
class Place {
    private int $id;
    private string $name;
    private bool $favorite;
    private float $coordinates;
    private string $type;

    public function __construct(string $name, bool $favorite, float $coordinates, string $type) {
        $this->name = $name;
        $this->favorite = $favorite;
        $this->coordinates = $coordinates;
        $this->type = $type;
    }
    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getFavorite(): bool {
        return $this->favorite;
    }
    public function getCoordinates(): float {
        return $this->coordinates;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setFavorite(bool $favorite): void
    {
        $this->favorite = $favorite;
    }
    public function setCoordinates(float $coordinates): void
    {
        $this->coordinates = $coordinates;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
?>