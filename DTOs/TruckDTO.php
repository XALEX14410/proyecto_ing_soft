<?
class TruckDTO {
    public int $number;
    public string $driver;
    public string $agency;
    public bool $state;

    public function __construct(int $number, string $driver, string $agency, bool $state) {
        $this->number = $number;
        $this->driver = $driver;
        $this->agency = $agency;
        $this->state = $state;
    }
}