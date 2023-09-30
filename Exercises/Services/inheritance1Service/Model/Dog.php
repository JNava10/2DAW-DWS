<?php

namespace Model;

require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Controller/AnimalBasedInterface.php';

use Controller\AnimalBasedInterface;

class Dog extends Animal implements AnimalBasedInterface {
    public $isWalking;
    public $noise = "guau";

    public function makeNoise() {
        return $this->noise;
    }

    public function heed() {
        return rand(1, 100) <= 90;
    }

    public function takeWalk() {
        $this->isWalking = true;
    }
}