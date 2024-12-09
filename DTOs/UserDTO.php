<?
class UserDTO {
    public string $name;
    public string $lastname;
    public string $email;
    public int $age;

    public function __construct(string $name, string $lastname, string $email, int $age) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->age = $age;
    }
}