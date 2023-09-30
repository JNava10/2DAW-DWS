<?php

namespace Model;

require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Controller/AnimalBasedInterface.php';
use Controller\AnimalBasedInterface;

class Cat extends Animal implements AnimalBasedInterface {
    public $noise = "miau";

    public function makeNoise() {
        return $this->noise;
    }

    public function heed() {
        return rand(1, 100) <= 5;
    }

    public function coughHairball() {
        return true;
    }
}