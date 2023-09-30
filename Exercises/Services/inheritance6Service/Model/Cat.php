<?php
namespace Model;

use inheritance8Service\Model\Animal;

class Cat extends Animal {
    public function __construct($name, $color, $weight) {
        $noise = 'miau';
        parent::__construct($name, $color, $weight, $noise);
    }

    public function heed(): bool {
        return rand(1, 100) <= 5;
    }

    public function coughHairball(): bool {
        return true;
    }
}