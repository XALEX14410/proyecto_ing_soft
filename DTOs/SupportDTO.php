<?
class SupportDTO {
    public int $typeProblem;
    public string $problem;
    public UserDTO $user;

    public function __construct(int $typeProblem, string $problem, UserDTO $user) {
        $this->typeProblem = $typeProblem;
        $this->problem = $problem;
        $this->user = $user;
    }
}