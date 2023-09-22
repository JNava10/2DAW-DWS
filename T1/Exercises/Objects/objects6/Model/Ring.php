<?php

namespace Model;

class Ring
{
    private $ringColors = ['r', 'v', 'a'];
    public $color;

    public function __call($name, $arguments)
    {
        // TODO: Two constructors, empty (random color) and one with color parameter.
        if ($name == '__constructor' || count($arguments) < 1) {
            $this->color = array_rand($this->ringColors);
        }
        else if ($name == '_constructor') {
            $this->color = $arguments[0];
        }
    }

    public function getColor()
    {
        return $this->color;
    }
}