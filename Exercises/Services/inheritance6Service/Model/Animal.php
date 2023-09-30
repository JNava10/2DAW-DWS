<?php

require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Model/Animal.php';
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Controller/AnimalInterface.php';

use inheritance8Service\Controller\AnimalInterface;

class Animal implements AnimalInterface {
    public $name;
    public $race;
    public $weight;
    public $color;
    public $sleeping;
    public $noise;
    public $eating;
    public function __construct(
        string $name,
        string $color,
        int $weight,
        string $noise
    ) {
        $this->name = $name;
        $this->color = $color;
        $this->race = "Any";
        $this->sleeping = false;
        $this->weight = $weight;
        $this->noise = $noise;
        $this->eating = false;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getRace() {
        return $this->race;
    }

    public function setRace($race) {
        $this->race = $race;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getSleeping() {
        return $this->sleeping;
    }

    public function setSleeping($sleeping) {
        $this->sleeping = $sleeping;
    }

    public function getSound() {
        return $this->sound;
    }

    public function setSound($sound) {
        $this->sound = $sound;
    }

    public function makeNoise() {
        return $this->noise;
    }

    public function heed() {
        return rand(1, 100) <= 50;
    }

    public function eat() {
        $this->eating = true;
    }
}