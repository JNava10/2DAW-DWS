<?php

namespace Model;

class Snake
{
    public $rings;
    public $age;
    public $isDeath;
    public $size;

    public function __construct()
    {
        $this->size = count($this->rings);
        $this->isDeath = false;
        $this->rings[] = new Ring();
    }

    public function getRings()
    {
        return $this->rings;
    }

    public function setRings($rings)
    {
        $this->rings = $rings;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getIsDeath()
    {
        return $this->isDeath;
    }

    public function setIsDeath($isDeath)
    {
        $this->isDeath = $isDeath;
    }


}