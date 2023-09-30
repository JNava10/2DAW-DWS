<?php
namespace Controller;


use inheritance8Service\Model\Cat;
use inheritance8Service\Model\Dog;
use Model\Animal;

class AnimalBuilder {
    static function generateRandomAnimal() {
        switch (rand(0, 2)) {
            case 0:
                $animal = new Animal('Brownie', 'Brown', 190, 'Any');
                break;
            case 1:
                $animal = new Dog('Perry', 'Brown', 8);
                break;
            default:
                $animal = new Cat('Kira', 'Black', 4);
        }

        return $animal;
    }

    static function generateAnimals(int $quantity): array {
        $domesticNames = ['Perry', 'Kira', 'Penny', 'Brownie', 'Choco'];
        $animals = [];
        for ($i = 0; $i < $quantity; $i++) {
            $randomNumber = rand(0, 2);
            $name = $domesticNames[array_rand($domesticNames)];

            if ($randomNumber == 0) {
                $animals[]['animal'] = new Animal($name, "Gold", rand(5, 20), 'Any');
            } elseif ($randomNumber == 1) {
                $animals[]['dog'] = new Dog($name, "Brown", rand(5, 25));
            } else {
                $animals[]['cat'] = new Cat($name, "Black", rand(4, 8));
            }
        }

        return $animals;
    }
}