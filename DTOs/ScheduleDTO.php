<?
class ScheduleDTO {
    public float $hour;
    public RouteDTO $route;

    public function __construct(float $hour, RouteDTO $route) {
        $this->hour = $hour;
        $this->route = $route;
    }
}