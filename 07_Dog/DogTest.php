<?php declare(strict_types=1);

require_once "Dog.php";

class DogTest extends Dog
{
    public function setFather(Dog $father): DogTest
    {
        $this->father = $father;
        return $this;
    }

    public function setMother (Dog $mother): DogTest
    {
        $this->mother = $mother;
        return $this;
    }
}
