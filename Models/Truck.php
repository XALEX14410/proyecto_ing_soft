<?php
class Truck
{
    private int $id;
    private int $number;
    private string $driver;
    private string $agency;
    private bool $state;

    public function __construct(int $number, string $driver, string $agency, bool $state)
    {
        $this->number = $number;
        $this->driver = $driver;
        $this->agency = $agency;
        $this->state = $state;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getNumber(): int
    {
        return $this->number;
    }
    public function getDriver(): string
    {
        return $this->driver;
    }
    public function getAgency(): string
    {
        return $this->agency;
    }
    public function getState(): bool
    {
        return $this->state;
    }
    public function setNumber(int $number): void
    {
        $this->number = $number;
    }
    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }
    public function setAgency(string $agency): void
    {
        $this->agency = $agency;
    }
    public function setState(bool $state): void
    {
        $this->state = $state;
    }
}
?>