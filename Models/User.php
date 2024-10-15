<?php
class User 
{
    private int $id;
    private float $location;
    private string $name;
    private string $lastname;
    private int $age;
    private int $telephone;
    private string $mail;
    private string $password;
    private string $photo;
    private string $type;

    public function __constructor(float $location, string $name, string $lastname, int $age, int $telephone, string $mail, string $password, string $photo, string $type)
    {
    $this->location = $location;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->telephone = $telephone;
    $this->mail = $mail;
    $this->password = $password;
    $this->photo = $photo;
    $this->type = $type;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getLocation(): string
    {
        return $this->location;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function setLocation(float $location): void
    {
        $this->location = $location;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    public function setTelephone(int $telephone): void
    {
        $this->telephone = $telephone;
    }
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
    }
    ?>