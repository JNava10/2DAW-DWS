<?php

namespace Inheritance;

class Character {
    public $name;
    public $age;

    public function attack() {
        // TODO: ...
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


}