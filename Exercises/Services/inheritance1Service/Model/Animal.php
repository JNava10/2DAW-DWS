<?php

namespace Model;

class Animal {
    public $name;
    public $race;
    public $weight;
    public $color;
    public $sleeping;

    public function __construct(string $name, string $color, int $weight) {
        $this->name = $name;
        $this->color = $color;
        $this->sleeping = false;
        $this->weight = $weight;
    }

    public function eat() {
        $this->weight++;
    }

    public function sleep() {
        $this->sleeping = true;
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
}