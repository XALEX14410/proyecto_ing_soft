<?php
class Support
{
    private int $id;
    private int $typeProblem;
    private string $problem;
    private User $user;

    public function __construct(int $typeProblem, string $problem, User $user)
    {
        $this->typeProblem = $typeProblem;
        $this->problem = $problem;
        $this->user = $user;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTypeProblem(): int
    {
        return $this->typeProblem;
    }
    public function getProblem(): string
    {
        return $this->problem;
    }
    public function getUser(): User
    {
        return $this->user;
    }

    public function setTypeProblem(int $typeProblem): void
    {
        $this->typeProblem = $typeProblem;
    }
    public function setProblem(string $problem): void
    {
        $this->problem = $problem;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}