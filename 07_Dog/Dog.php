<?php declare(strict_types=1);

class Dog
{
    protected string $name;
    private string $sex;
    protected Dog $mother;
    protected Dog $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function fathersName(): string
    {
        if (isset($this->father)) {
            return $this->father->name . PHP_EOL;
        }
        return "Unknown" . PHP_EOL;
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if (isset($this->mother) && isset($otherDog->mother)) {
            return ($this->mother->name == $otherDog->mother->name);
        } else return false;
    }
}