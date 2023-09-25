<?php

namespace Model;

class Nest
{
    public $snakes;

    public function getSnakes()
    {
        return $this->snakes;
    }

    public function getSnakeNum(): int
    {
        return $this->snakeNum;
    }

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