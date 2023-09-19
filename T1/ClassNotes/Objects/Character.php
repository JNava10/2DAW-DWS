<?php

class Character
{
    private $name;
    private $age;

    static $TITANTYPE = 'Attack';

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function __construct($name, $age)
    {
        self::$TITANTYPE = 'a';
        $this->name = $name;
        $this->age = $age;
    }

    public function attack()
    {
        return "$this->name is attacking";
    }

    public function __call($name, $arguments)
    {
        if ($name == 'attack' && count($arguments) == 1) {

        }
    }


    public function __toString()
    {
        return "Name: $this->name, $this->age";
    }
}