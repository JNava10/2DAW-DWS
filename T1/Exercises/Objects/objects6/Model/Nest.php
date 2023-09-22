<?php

namespace Model;

class Nest
{
    public $snakes;
    public $snakeNum;

    /**
     * @param $snakes
     */
    public function __construct($snakes)
    {
        $this->snakes = $snakes;
        $this->snakeNum = count($snakes);
    }


}