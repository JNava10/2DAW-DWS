<?php

namespace Model;

class Ring
{
    private $ringColors = ['r', 'v', 'a'];
    public $color;

    public function __construct()
    {
        $this->color = $this->ringColors[array_rand($this->ringColors)];
    }

    public function __call($name, $arguments)
    {
        if ($name == '__constructor' && count($arguments) < 1) {
            $this->color = array_rand($this->ringColors);
        }
    }

    public function getColor()
    {
        return $this->color;
    }


}