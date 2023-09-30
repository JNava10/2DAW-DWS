<?php

namespace factory;
use carInfo;

class carFactory
{
    private function createCars(int $quantity)
    {
        $carValues = carInfo::$carValues;
        $cars = [];
        for ($i = 0; $i < $quantity; $i++) {
            $cars[] = new Car(
                array_rand($carValues['brand']),
                array_rand($carValues['color'])
            );
        }

        return $cars;
    }

}

