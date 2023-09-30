<?php
namespace Model;

use inheritance8Service\Model\Animal;

class Dog extends Animal {
    public $isWalking;

    public function __construct(
        string $name,
        string $color,
        int $weight
    ) {
        $noise = 'guau';
        $this->isWalking = false;
        parent::__construct($name, $color, $weight, $noise);
    }

    public function heed(): bool
    {
        return rand(1, 100) <= 90;
    }

    public function takeWalk() {
        $this->isWalking = true;
    }
}